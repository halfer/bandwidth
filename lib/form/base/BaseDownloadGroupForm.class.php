<?php

/**
 * DownloadGroup form base class.
 *
 * @method DownloadGroup getObject() Returns the current form's model object
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDownloadGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'rate_limit'              => new sfWidgetFormInputText(),
      'count_limit'             => new sfWidgetFormInputText(),
      'bandwidth_limit'         => new sfWidgetFormInputText(),
      'concurrent_limit'        => new sfWidgetFormInputText(),
      'concurrent_limit_per_ip' => new sfWidgetFormInputText(),
      'valid_from'              => new sfWidgetFormDate(),
      'valid_to'                => new sfWidgetFormDate(),
      'is_use_landing'          => new sfWidgetFormInputCheckbox(),
      'is_use_captcha'          => new sfWidgetFormInputCheckbox(),
      'system_group_type'       => new sfWidgetFormInputText(),
      'is_enabled'              => new sfWidgetFormInputCheckbox(),
      'file_group_list'         => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'DownloadFile')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'DownloadGroup', 'column' => 'id', 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'rate_limit'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'count_limit'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'bandwidth_limit'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'concurrent_limit'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'concurrent_limit_per_ip' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'valid_from'              => new sfValidatorDate(array('required' => false)),
      'valid_to'                => new sfValidatorDate(array('required' => false)),
      'is_use_landing'          => new sfValidatorBoolean(array('required' => false)),
      'is_use_captcha'          => new sfValidatorBoolean(array('required' => false)),
      'system_group_type'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_enabled'              => new sfValidatorBoolean(),
      'file_group_list'         => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'DownloadFile', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DownloadGroup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['file_group_list']))
    {
      $values = array();
      foreach ($this->object->getFileGroups() as $obj)
      {
        $values[] = $obj->getDownloadFileId();
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
    $c->add(FileGroupPeer::DOWNLOAD_GROUP_ID, $this->object->getPrimaryKey());
    FileGroupPeer::doDelete($c, $con);

    $values = $this->getValue('file_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new FileGroup();
        $obj->setDownloadGroupId($this->object->getPrimaryKey());
        $obj->setDownloadFileId($value);
        $obj->save();
      }
    }
  }

}
