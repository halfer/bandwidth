<?php

/**
 * DownloadGroup form.
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
class DownloadGroupForm extends BaseDownloadGroupForm
{
  public function configure()
  {
		// These are not to be edited in groups - we edit this many-many when editing files
		unset($this->widgetSchema['file_group_list']);
		unset($this->validatorSchema['file_group_list']);
		
		// This field is a "default state" for files/groups - not sure how this will be edited yet
		unset($this->widgetSchema['system_group_type']);
		unset($this->validatorSchema['system_group_type']);

		// Not supporting these yet
		unset($this->widgetSchema['is_use_landing']);
		unset($this->validatorSchema['is_use_landing']);
		unset($this->widgetSchema['is_use_captcha']);
		unset($this->validatorSchema['is_use_captcha']);
		
		$this->validatorSchema['name']->setOption('required', true);
   }
}
