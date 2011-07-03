<?php

/**
 * DownloadFile form base class.
 *
 * @method DownloadFile getObject() Returns the current form's model object
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDownloadFileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'folder'          => new sfWidgetFormInputText(),
      'path'            => new sfWidgetFormInputText(),
      'original_uri'    => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'checked_at'      => new sfWidgetFormDateTime(),
      'size'            => new sfWidgetFormInputText(),
      'is_enabled'      => new sfWidgetFormInputCheckbox(),
      'file_group_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'DownloadGroup')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'DownloadFile', 'column' => 'id', 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'folder'          => new sfValidatorString(array('max_length' => 100)),
      'path'            => new sfValidatorString(array('max_length' => 255)),
      'original_uri'    => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'checked_at'      => new sfValidatorDateTime(array('required' => false)),
      'size'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_enabled'      => new sfValidatorBoolean(),
      'file_group_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'DownloadGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DownloadFile';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['file_group_list']))
    {
      $values = array();
      foreach ($this->object->getFileGroups() as $obj)
      {
        $values[] = $obj->getDownloadGroupId();
      }

      $this->setDefault('file_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveFileGroupList($con);
  }

  public function saveFileGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['file_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(FileGroupPeer::DOWNLOAD_FILE_ID, $this->object->getPrimaryKey());
    FileGroupPeer::doDelete($c, $con);

    $values = $this->getValue('file_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new FileGroup();
        $obj->setDownloadFileId($this->object->getPrimaryKey());
        $obj->setDownloadGroupId($value);
        $obj->save();
      }
    }
  }

}
