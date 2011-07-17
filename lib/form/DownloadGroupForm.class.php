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

		// Not required in the db, but required in the form
		$this->validatorSchema['name']->setOption('required', true);
		
		// Set up time stuff
		$this->configureTimeWidgets();

		// Not supporting these yet
		unset($this->widgetSchema['is_use_landing']);
		unset($this->validatorSchema['is_use_landing']);
		unset($this->widgetSchema['is_use_captcha']);
		unset($this->validatorSchema['is_use_captcha']);
	}

	protected function configureTimeWidgets()
	{
		// Add time input devices
		$this->timeInput('reset_frequency', $this->getObject()->getResetFrequency());
		$this->timeInput('reset_offset', $this->getObject()->getResetOffset());
		
		// Custom validation for optional time reset stuff
		$this->validatorSchema->setPreValidator(
			new sfValidatorCallback(
				array(
					'callback' => array($this, 'checkTimeReset'),
				)
			)
		);
	}

	protected function timeInput($name, $timestamp)
	{
		$elements = array('weeks', 'days', 'hours', 'minutes', 'seconds');
		$values = $this->getTimePartsFromTimestamp($timestamp);
		
		// Set up the widgets and validators the same
		foreach ($elements as $element)
		{
			$elementName = $name . '[' . $element . ']';
			$this->widgetSchema[$elementName] = new sfWidgetFormInput(
				array(), array('size' => 5)
			);
			
			// @todo This doesn't work to preserve the values of the forms in case of error
			$dbValue = isset($values[$element]) ? $values[$element] : '';
			$this->setDefault(
				$elementName,
				$_POST ? $_POST['download_group'][$name][$element] : $dbValue
			);
		}

		// Set up callback validator for whole widget
		$this->validatorSchema[$name] = new sfValidatorCallback(
			array('callback' => array($this, 'checkTimeInput'))
		);
	}

	public function checkTimeReset(sfValidatorCallback $validator, array $values)
	{
		// Can't have a offset without a frequency
		$hasFrequency = (bool) array_sum($values['reset_frequency']);
		$hasOffset = (bool) array_sum($values['reset_offset']);

		if ($hasOffset && !$hasFrequency)
		{
			throw new sfValidatorError(
				$validator,
				'A reset frequency is required if a reset offset is supplied'
			);
		}
	}

	public function checkTimeInput(sfValidatorCallback $validator, $value)
	{
		if (!BandwidthUtils::validateTimeParts($value))
		{
			throw new sfValidatorError(
				$validator,
				'Time components may contain whole numbers only'
			);
		}

		// Clean the result here
		return BandwidthUtils::getTimestampFromTimeParts($value);
	}

	protected function getTimePartsFromTimestamp($timestamp)
	{
		$parts = array();

		// Only set these values if the reset system is non-null
		if (!is_null($timestamp))
		{
			$parts['seconds'] = $timestamp % 60;
			$timestamp -= $parts['seconds'];
			$timestamp /= 60;

			$parts['minutes'] = $timestamp % 60;
			$timestamp -= $parts['minutes'];
			$timestamp /= 60;

			$parts['hours'] = $timestamp % 24;
			$timestamp -= $parts['hours'];
			$timestamp /= 24;

			$parts['days'] = $timestamp % 7;
			$timestamp -= $parts['days'];
			$timestamp /= 7;

			$parts['weeks'] = $timestamp;
		}
		
		// Null any items that are not used
		foreach ($parts as $key => $value)
		{
			if (!$value)
			{
				$parts[$key] = null;
			}
		}
		
		return $parts;
	}
}
