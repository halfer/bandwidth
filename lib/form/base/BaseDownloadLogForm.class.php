<?php

/**
 * DownloadLog form base class.
 *
 * @method DownloadLog getObject() Returns the current form's model object
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDownloadLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'download_file_id' => new sfWidgetFormPropelChoice(array('model' => 'DownloadFile', 'add_empty' => false)),
      'started_at'       => new sfWidgetFormDateTime(),
      'last_accessed_at' => new sfWidgetFormDateTime(),
      'ip'               => new sfWidgetFormInputText(),
      'byte_count'       => new sfWidgetFormInputText(),
      'is_aborted'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'DownloadLog', 'column' => 'id', 'required' => false)),
      'download_file_id' => new sfValidatorPropelChoice(array('model' => 'DownloadFile', 'column' => 'id')),
      'started_at'       => new sfValidatorDateTime(),
      'last_accessed_at' => new sfValidatorDateTime(array('required' => false)),
      'ip'               => new sfValidatorString(array('max_length' => 17)),
      'byte_count'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'is_aborted'       => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('download_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DownloadLog';
  }


}
