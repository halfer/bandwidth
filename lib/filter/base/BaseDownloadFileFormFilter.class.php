<?php

/**
 * DownloadFile filter form base class.
 *
 * @package    bandwidth
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDownloadFileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'path'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'original_uri'    => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'checked_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'size'            => new sfWidgetFormFilterInput(),
      'is_enabled'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'file_group_list' => new sfWidgetFormPropelChoice(array('model' => 'DownloadGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'path'            => new sfValidatorPass(array('required' => false)),
      'original_uri'    => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'checked_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'size'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_enabled'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'file_group_list' => new sfValidatorPropelChoice(array('model' => 'DownloadGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_file_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addFileGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(FileGroupPeer::DOWNLOAD_FILE_ID, DownloadFilePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(FileGroupPeer::DOWNLOAD_GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(FileGroupPeer::DOWNLOAD_GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'DownloadFile';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'path'            => 'Text',
      'original_uri'    => 'Text',
      'created_at'      => 'Date',
      'checked_at'      => 'Date',
      'size'            => 'Number',
      'is_enabled'      => 'Boolean',
      'file_group_list' => 'ManyKey',
    );
  }
}
