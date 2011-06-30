<?php

/**
 * UploadQueue form base class.
 *
 * @method UploadQueue getObject() Returns the current form's model object
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUploadQueueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'owner_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'file_id'      => new sfWidgetFormPropelChoice(array('model' => 'DownloadFile', 'add_empty' => true)),
      'url'          => new sfWidgetFormInputText(),
      'path'         => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDate(),
      'processed_at' => new sfWidgetFormDate(),
      'status'       => new sfWidgetFormInputText(),
      'report'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'UploadQueue', 'column' => 'id', 'required' => false)),
      'owner_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'file_id'      => new sfValidatorPropelChoice(array('model' => 'DownloadFile', 'column' => 'id', 'required' => false)),
      'url'          => new sfValidatorString(array('max_length' => 512)),
      'path'         => new sfValidatorString(array('max_length' => 255)),
      'created_at'   => new sfValidatorDate(),
      'processed_at' => new sfValidatorDate(array('required' => false)),
      'status'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'report'       => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('upload_queue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UploadQueue';
  }


}
