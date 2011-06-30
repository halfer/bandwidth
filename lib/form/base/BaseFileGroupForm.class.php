<?php

/**
 * FileGroup form base class.
 *
 * @method FileGroup getObject() Returns the current form's model object
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFileGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'download_file_id'  => new sfWidgetFormInputHidden(),
      'download_group_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'download_file_id'  => new sfValidatorPropelChoice(array('model' => 'DownloadFile', 'column' => 'id', 'required' => false)),
      'download_group_id' => new sfValidatorPropelChoice(array('model' => 'DownloadGroup', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('file_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FileGroup';
  }


}
