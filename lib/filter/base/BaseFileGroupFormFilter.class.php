<?php

/**
 * FileGroup filter form base class.
 *
 * @package    bandwidth
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFileGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('file_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FileGroup';
  }

  public function getFields()
  {
    return array(
      'download_file_id'  => 'ForeignKey',
      'download_group_id' => 'ForeignKey',
    );
  }
}
