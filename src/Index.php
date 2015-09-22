<?php //-->
/*
 * This file is part of the Validation package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Validation;

/**
 * The base class for all classes wishing to integrate with Eden.
 * Extending this class will allow your methods to seemlessly be
 * overloaded and overrided as well as provide some basic class
 * loading patterns.
 *
 * @vendor Eden
 * @package validation
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Index extends Base
{
	protected $value = null;
	
	/**
	 * Sets the value to be validated
	 *
	 * @param mixed
	 * @return void
	 */
	public function __construct($value) 
	{	
		$this->value = $value;
	}
	
	/**
	 * Returns true if the value is a given type
	 * 
	 * @param string
	 * @param bool
	 */
	public function isType($type, $soft = false) 
	{
		//argument 1 must be a string
		Argument::i()->test(1, 'string');
		
		switch(true) {
			case $type === 'number':
				return is_numeric($this->value);
			case $type === 'integer':
			case $type === 'int':
				return is_numeric($this->value) && strpos((string) $this->value, '.') === false;
			case $type === 'int' && $soft:
				return $this->isSoftInteger($this->value);
			case $type === 'float':
				return is_numeric($this->value) && strpos((string) $this->value, '.') !== false;
			case $type === 'float' && $soft:
				return $this->isSoftFloat($this->value);
			case $type === 'bool' && $soft:
				return $this->isSoftBool($this->value);
			case $type === 'file':
				return is_string($this->value) && file_exists($this->value);
			case $type === 'folder':
				return is_string($this->value) && is_dir($this->value);
			case $type === 'date':
				return is_string($this->value) && $this->isDate($this->value);
			case $type === 'time':
				return is_string($this->value) && $this->isTime($this->value);
			case $type === 'email':
				return is_string($this->value) && $this->isEmail($this->value);
			case $type === 'json':
				return is_string($this->value) && $this->isJson($this->value);
			case $type === 'url':
				return is_string($this->value) && $this->isUrl($this->value);
			case $type === 'html':
				return is_string($this->value) && $this->isHtml($this->value);
			case $type === 'creditcard':
			case $type === 'cc':
				return (is_string($this->value) || is_int($this->value)) && $this->isCreditCard($this->value);
			case $type === 'hex':
				return is_string($this->value) && $this->isHex($this->value);
			case $type === 'slug':
			case $type === 'shortname':
			case $type === 'short':
				return !!preg_match("/^[a-z0-9-_]+$/", $this->value);
			case $type === 'alphanum':
				return is_string($this->value) && $this->alphaNumericUnderScore();
			case $type === 'alphanum_':
				return is_string($this->value) && $this->alphaNumericUnderScore();
			case $type === 'alphanum-':
				return is_string($this->value) && $this->alphaNumericHyphen();
			case $type === 'alphanum-_':
				return is_string($this->value) && $this->alphaNumericLine();
			default: break;
		}
		
		$method = 'is_'.$type;
		if(function_exists($method)) {
			return $method($this->value);
		}
		
		if(class_exists($type)) {
			return $this->value instanceof $type;
		}
		
		return false;
	}
	
	/**
	 * Returns true if the value is greater than the passed argument
	 *
	 * @param number
	 * @return bool
	 */
	public function greaterThan($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return $this->value > (float)$number;
	}
	
	/**
	 * Returns true if the value is greater or 
	 * equal to than the passed argument
	 *
	 * @param number
	 * @return bool
	 */
	public function greaterThanEqualTo($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return $this->value >= (float)$number;
	}
	
	/**
	 * Returns true if the value is less than the passed argument
	 *
	 * @param number
	 * @return bool
	 */
	public function lessThan($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return $this->value < (float)$number;
	}
	
	/**
	 * Returns true if the value is less than 
	 * or equal the passed argument
	 *
	 * @param number
	 * @return bool
	 */
	public function lessThanEqualTo($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return $this->value <= (float)$number;
	}
	
	/**
	 * Returns true if the value length is greater than the passed argument
	 *
	 * @param number
	 * @return bool
	 */		
	public function lengthGreaterThan($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return strlen((string)$this->value) > (float)$number;
	}
	
	/**
	 * Returns true if the value length is greater 
	 * than or equal to the passed argument
	 *
	 * @param number
	 * @return bool
	 */	
	public function lengthGreaterThanEqualTo($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return strlen((string)$this->value) >= (float)$number;
	}
	
	/**
	 * Returns true if the value length is less than the passed argument
	 *
	 * @param number
	 * @return bool
	 */	
	public function lengthLessThan($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return strlen((string)$this->value) < (float)$number;
	}
	
	/**
	 * Returns true if the value length is less 
	 * than or equal to the passed argument
	 *
	 * @param number
	 * @return bool
	 */	
	public function lengthLessThanEqualTo($number) 
	{
		//argument 1 must be numeric
		Argument::i()->test(1, 'numeric');
		
		return strlen((string)$this->value) <= (float)$number;
	}
	
	/**
	 * Returns true if the value is not empty
	 *
	 * @return bool
	 */	
	public function notEmpty() 
	{
		return !empty($this->value);
	}
	
	/**
	 * Returns true if the value starts with a specific letter
	 *
	 * @return bool
	 */	
	public function startsWithLetter() 
	{
		return !!preg_match("/^[a-zA-Z]/i", $this->value);
	}
	
	/**
	 * Returns true if the value is alpha numeric
	 *
	 * @return bool
	 */	
	public function alphaNumeric() 
	{
		return !!preg_match('/^[a-zA-Z0-9]+$/', (string) $this->value);
	}
	
	/**
	 * Returns true if the value is alpha numeric underscore
	 *
	 * @return bool
	 */	
	public function alphaNumericUnderScore() 
	{
		return !!preg_match('/^[a-zA-Z0-9_]+$/', (string) $this->value);
	}
	
	/**
	 * Returns true if the value is alpha numeric hyphen
	 *
	 * @return bool
	 */	
	public function alphaNumericHyphen() 
	{
		return !!preg_match('/^[a-zA-Z0-9-]+$/', (string) $this->value);
	}
	
	/**
	 * Returns true if the value is alpha numeric hyphen or underscore
	 *
	 * @return bool
	 */	
	public function alphaNumericLine() 
	{
		return !!preg_match('/^[a-zA-Z0-9-_]+$/', (string) $this->value);
	}
	
	/**
	 * Returns true if the value is a credit card
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isCreditCard($value) 
	{
		return preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]'.
		'{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-'.
		'5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/', $value);
	}
	
	/**
	 * Returns true if the value is a mysql date
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isDate($value) 
	{
		return preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/is', (string) $value);
	} 
	
	/**
	 * Returns true if the value is an email
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isEmail($value) 
	{
		return preg_match('/^(?:(?:(?:[^@,"\[\]\x5c\x00-\x20\x7f-\xff\.]|\x5c(?=[@,"\[\]'.
		'\x5c\x00-\x20\x7f-\xff]))(?:[^@,"\[\]\x5c\x00-\x20\x7f-\xff\.]|(?<=\x5c)[@,"\[\]'.
		'\x5c\x00-\x20\x7f-\xff]|\x5c(?=[@,"\[\]\x5c\x00-\x20\x7f-\xff])|\.(?=[^\.])){1,62'.
		'}(?:[^@,"\[\]\x5c\x00-\x20\x7f-\xff\.]|(?<=\x5c)[@,"\[\]\x5c\x00-\x20\x7f-\xff])|'.
		'[^@,"\[\]\x5c\x00-\x20\x7f-\xff\.]{1,2})|"(?:[^"]|(?<=\x5c)"){1,62}")@(?:(?!.{64})'.
		'(?:[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.?|[a-zA-Z0-9]\.?)+\.(?:xn--[a-zA-Z0-9]'.
		'+|[a-zA-Z]{2,6})|\[(?:[0-1]?\d?\d|2[0-4]\d|25[0-5])(?:\.(?:[0-1]?\d?\d|2[0-4]\d|25'.
		'[0-5])){3}\])$/', (string) $value);
	}
	
	/**
	 * Returns true if the value is HTML
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isHtml($value) 
	{
		return preg_match("/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*".
		"(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i", (string) $value);
	}
	
	/**
	 * Returns true if the value is JSON
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isJson($string) 
	{
		json_decode($string);
 		return json_last_error() === JSON_ERROR_NONE;
	}
	
	/**
	 * Test if 0 or 1 or string 1 oe 0
	 *
	 * @param string|number
	 * @return this
	 */
	protected function isSoftBool($string) 
	{
		if(!is_scalar($string) || $string === null) {
			return false;
		}
		
		$string = (string) $string;
		
		return $string == '0' || $string == '1';
	}
	
	/**
	 * Test if float or string float
	 *
	 * @param string|number
	 * @return this
	 */
	protected function isSoftFloat($number)
	{
		if(!is_scalar($number) || $number === null) {
			return false;
		}
		
		$number = (string) $number;
		
		return preg_match('/^[-+]?(\d*)?\.\d+$/', $number);
	}
	
	/**
	 * Test if integer or string integer
	 *
	 * @param string|number
	 * @return this
	 */
	protected function isSoftInteger($number)
	{
		if(!is_scalar($number) || $number === null) {
			return false;
		}
		
		$number = (string) $number;
		
		return preg_match('/^[-+]?\d+$/', $number);
	}
	
	/**
	 * Returns true if the value is between 0 and 9
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isSmall($value) 
	{
		if(!is_scalar($value) || $value === null) {
			return false;
		}
		
		$value = (float) $value;
		
		return $number >= 0 && $number <= 9;
	} 
	
	/**
	 * Returns true if the value is a mysql time
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isTime($value) 
	{
		return preg_match('/^[0-9]{2}\:[0-9]{2}\:[0-9]{2}$/is', (string) $value);
	} 
	
	/**
	 * Returns true if the value is a URL
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isUrl($value) 
	{
		return preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0'.
		'-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?\/?/i', (string) $value);
	}
	
	/**
	 * Returns true if the value is a hex
	 *
	 * @param scalar
	 * @return bool
	 */
	protected function isHex($value) 
	{
		return preg_match("/^[0-9a-fA-F]{6}$/", (string) $value);
	}
	
}