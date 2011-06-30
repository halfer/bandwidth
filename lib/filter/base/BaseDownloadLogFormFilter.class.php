<?php

/**
 * DownloadLog filter form base class.
 *
 * @package    bandwidth
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDownloadLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'download_file_id' => new sfWidgetFormPropelChoice(array('model' => 'DownloadFile', 'add_empty' => true)),
      'started_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'last_accessed_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'ip'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'byte_count'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_aborted'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'download_file_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DownloadFile', 'column' => 'id')),
      'started_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_accessed_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ip'               => new sfValidatorPass(array('required' => false)),
      'byte_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_aborted'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('download_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DownloadLog';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'download_file_id' => 'ForeignKey',
      'started_at'       => 'Date',
      'last_accessed_at' => 'Date',
      'ip'               => 'Text',
      'byte_count'       => 'Number',
      'is_aborted'       => 'Boolean',
    );
  }
}
