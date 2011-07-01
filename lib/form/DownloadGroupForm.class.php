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
		unset($this->widgetSchema['file_group_list']);
		unset($this->validatorSchema['file_group_list']);
		
		$this->validatorSchema['name']->setOption('required', true);
   }
}
