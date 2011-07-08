<?php

/**
 * DownloadGroup filter form base class.
 *
 * @package    bandwidth
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDownloadGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(),
      'rate_limit'              => new sfWidgetFormFilterInput(),
      'count_limit'             => new sfWidgetFormFilterInput(),
      'bandwidth_limit'         => new sfWidgetFormFilterInput(),
      'concurrent_limit'        => new sfWidgetFormFilterInput(),
      'concurrent_limit_per_ip' => new sfWidgetFormFilterInput(),
      'valid_from'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'valid_to'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_use_landing'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_use_captcha'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'system_group_type'       => new sfWidgetFormFilterInput(),
      'reset_frequency'         => new sfWidgetFormFilterInput(),
      'reset_offset'            => new sfWidgetFormFilterInput(),
      'is_enabled'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'file_group_list'         => new sfWidgetFormPropelChoice(array('model' => 'DownloadFile', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'rate_limit'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'count_limit'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bandwidth_limit'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'concurrent_limit'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'concurrent_limit_per_ip' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'valid_from'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'valid_to'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_use_landing'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_use_captcha'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'system_group_type'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reset_frequency'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reset_offset'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_enabled'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'file_group_list'         => new sfValidatorPropelChoice(array('model' => 'DownloadFile', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_group_filters[%s]');

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

    $criteria->addJoin(FileGroupPeer::DOWNLOAD_GROUP_ID, DownloadGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(FileGroupPeer::DOWNLOAD_FILE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(FileGroupPeer::DOWNLOAD_FILE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'DownloadGroup';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'rate_limit'              => 'Number',
      'count_limit'             => 'Number',
      'bandwidth_limit'         => 'Number',
      'concurrent_limit'        => 'Number',
      'concurrent_limit_per_ip' => 'Number',
      'valid_from'              => 'Date',
      'valid_to'                => 'Date',
      'is_use_landing'          => 'Boolean',
      'is_use_captcha'          => 'Boolean',
      'system_group_type'       => 'Number',
      'reset_frequency'         => 'Number',
      'reset_offset'            => 'Number',
      'is_enabled'              => 'Boolean',
      'file_group_list'         => 'ManyKey',
    );
  }
}
