<?php

/**
 * DownloadFile form.
 *
 * @package    bandwidth
 * @subpackage form
 * @author     Your name here
 */
class DownloadFileForm extends BaseDownloadFileForm
{
	public function configure()
	{
		// These are all set by the server, and the user is not permitted to reset them
		unset($this->widgetSchema['path']);
		unset($this->validatorSchema['path']);
		unset($this->widgetSchema['created_at']);
		unset($this->validatorSchema['created_at']);
		unset($this->widgetSchema['checked_at']);
		unset($this->validatorSchema['checked_at']);
		unset($this->widgetSchema['size']);
		unset($this->validatorSchema['size']);
		
		// @todo Better widget required for the File Group List - tickbox array?
	}
}
