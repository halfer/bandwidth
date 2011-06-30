<?php

function error_line($errors, $name)
{
	/* @var $errors sfOutputEscaperArrayDecorator */
	if ($errors instanceof sfOutputEscaperArrayDecorator)
	{
		$errors = $errors->getRawValue();
	}
	
	if (array_key_exists($name, $errors))
	{
		return $errors[$name];
	}
}
