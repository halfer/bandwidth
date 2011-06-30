<?php

/**
 * UploadQueue filter form base class.
 *
 * @package    bandwidth
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUploadQueueFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'owner_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'file_id'      => new sfWidgetFormPropelChoice(array('model' => 'DownloadFile', 'add_empty' => true)),
      'url'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'path'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'processed_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'status'       => new sfWidgetFormFilterInput(),
      'report'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'owner_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'file_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DownloadFile', 'column' => 'id')),
      'url'          => new sfValidatorPass(array('required' => false)),
      'path'         => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'processed_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'report'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('upload_queue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UploadQueue';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'owner_id'     => 'ForeignKey',
      'file_id'      => 'ForeignKey',
      'url'          => 'Text',
      'path'         => 'Text',
      'created_at'   => 'Date',
      'processed_at' => 'Date',
      'status'       => 'Number',
      'report'       => 'Text',
    );
  }
}
