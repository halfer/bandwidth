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

	/**
	 * This is no longer in use
	 */
	protected function configureTimeWidgetsOld()
	{
		// New widget to choose duration of time reset (if any)
		$resetMenu = array(
			0 => 'None',
			60 * 60 => 'Hourly',
			60 * 60 * 24 => 'Daily',
			60 * 60 * 24 * 7 => 'Weekly',
		);
		$this->widgetSchema['reset_chooser'] = new sfWidgetFormSelect(
			array(
				'choices' => $resetMenu,
			)
		);

		// Permitted values for select widget
		$this->validatorSchema['reset_chooser'] = new sfValidatorChoice(
			array(
				'choices' => array_keys( $resetMenu ),
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
			$this->setDefault(
				$elementName,
				$_POST ? $_POST['download_group'][$name][$element] : $values[$element]
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
		foreach ($value as $key => $subValue)
		{
			if ($subValue)
			{
				if (!is_numeric($subValue) || (strpos($subValue, '.') !== false))
				{
					throw new sfValidatorError(
						$validator,
						'Time components may contain whole numbers only'
					);
				}
			}
		}

		// Clean the result here
		return $this->getTimestampFromTimeParts($value);
	}

	protected function getTimestampFromTimeParts($parts)
	{
		$totalSec = 0;

		$totalSec += $parts['seconds'] + 0;
		$totalSec += $parts['minutes'] * 60;
		$totalSec += $parts['hours'] * 60 * 60;
		$totalSec += $parts['days'] * 60 * 60 * 24;
		$totalSec += $parts['weeks'] * 60 * 60 * 24 * 7;
		
		return $totalSec;
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
