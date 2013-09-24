<?php //-->
/*
 * This file is part of the Validation package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

class Eden_Validation_Tests_Validation_ValidationTest extends \PHPUnit_Framework_TestCase
{
    public function testIsType()
    {
        $valid = eden('validation', 1)->isType('int');
        $this->assertTrue($valid);
        $valid = eden('validation', '1')->isType('int');
        $this->assertTrue($valid);
        $valid = eden('validation', 'foo')->isType('int');
        $this->assertFalse($valid);
		
        $valid = eden('validation', 1.1)->isType('float');
        $this->assertTrue($valid);
        $valid = eden('validation', '4.9')->isType('float');
        $this->assertTrue($valid);
        $valid = eden('validation', 1)->isType('float');
        $this->assertFalse($valid);
        $valid = eden('validation', 'foo')->isType('float');
        $this->assertFalse($valid);
		
        $valid = eden('validation', '3.4')->isType('numeric');
        $this->assertTrue($valid);
        $valid = eden('validation', 'foo')->isType('numeric');
        $this->assertFalse($valid);
		
        $valid = eden('validation', 'foo')->isType('string');
        $this->assertTrue($valid);
        $valid = eden('validation', 1)->isType('string');
        $this->assertFalse($valid);
		
        $valid = eden('validation', 1)->isType('scalar');
        $this->assertTrue($valid);
        $valid = eden('validation', true)->isType('scalar');
        $this->assertTrue($valid);
        $valid = eden('validation', 'check')->isType('scalar');
        $this->assertTrue($valid);
        $valid = eden('validation', null)->isType('scalar');
        $this->assertFalse($valid);
		
        $valid = eden('validation', true)->isType('bool');
        $this->assertTrue($valid);
        $valid = eden('validation', 1)->isType('bool');
        $this->assertFalse($valid);
		
        $valid = eden('validation', array(1,2,3))->isType('array');
        $this->assertTrue($valid);
        $valid = eden('validation', 'not an array')->isType('array');
        $this->assertFalse($valid);
		
        $valid = eden('validation', new stdClass())->isType('object');
        $this->assertTrue($valid);
        $valid = eden('validation', 1)->isType('object');
        $this->assertFalse($valid);
		
		$valid = eden('validation', __FILE__)->isType('file');
        $this->assertTrue($valid);
		$valid = eden('validation', '/some/path')->isType('file');
        $this->assertFalse($valid);
		$valid = eden('validation', 1)->isType('file');
        $this->assertFalse($valid);
		
		$valid = eden('validation', __DIR__)->isType('folder');
        $this->assertTrue($valid);
		$valid = eden('validation', '/some/path')->isType('folder');
        $this->assertFalse($valid);
		$valid = eden('validation', 1)->isType('folder');
        $this->assertFalse($valid);
		
		$valid = eden('validation', 'james@hotmail.com')->isType('email');
        $this->assertTrue($valid);
		$valid = eden('validation', 'james@hot@mail.com')->isType('email');
        $this->assertFalse($valid);
		$valid = eden('validation', 'jam.es@hot.mail.com')->isType('email');
        $this->assertTrue($valid);
		
		$valid = eden('validation', 'http://www.hotmail.com/')->isType('url');
        $this->assertTrue($valid);
		$valid = eden('validation', 'www.hotmail.com/')->isType('url');
        $this->assertFalse($valid);
		
		$valid = eden('validation', '<div>Cool</div>')->isType('html');
        $this->assertTrue($valid);
		$valid = eden('validation', 'Not Cool')->isType('html');
        $this->assertFalse($valid);
		$valid = eden('validation', 'Not div>Cool')->isType('html');
        $this->assertFalse($valid);
		
        // Credit Card Number must treated as string not numeric value..
        // Pattern doesn't much on numeric when it exceed to 13+ length of value..
                // Visa
		$valid = eden('validation', '4485945357740101')->isType('cc');
        $this->assertTrue($valid);
                // MasterCard
		$valid = eden('validation', '5508760509409558')->isType('cc');
        $this->assertTrue($valid);
                // AMEX
		$valid = eden('validation', '340539457582696')->isType('cc');
        $this->assertTrue($valid);
                // Discover
		$valid = eden('validation', '6011938784708070')->isType('cc');
        $this->assertTrue($valid);
                // Dinners Club
		$valid = eden('validation', '36356552261053')->isType('cc');
        $this->assertTrue($valid);
        
		$valid = eden('validation', '1230495')->isType('cc');
        $this->assertFalse($valid);
		$valid = eden('validation', 'Foo')->isType('cc');
        $this->assertFalse($valid);
		
		$valid = eden('validation', '567ABC')->isType('hex');
        $this->assertTrue($valid);
		$valid = eden('validation', '19JK34')->isType('hex');
        $this->assertFalse($valid);
		
		$valid = eden('validation', 'some-short-title')->isType('slug');
        $this->assertTrue($valid);
		$valid = eden('validation', 'some-Short-title')->isType('slug');
        $this->assertFalse($valid);
		$valid = eden('validation', 'some short-title')->isType('slug');
        $this->assertFalse($valid);
    }
	
	public function testGreaterThan() 
	{
        $valid = eden('validation', 10)->greaterThan(5);
        $this->assertTrue($valid);
	}
	
	public function testGreaterThanEqualTo() 
	{
        $valid = eden('validation', 10)->greaterThanEqualTo(10);
        $this->assertTrue($valid);
	}
	
	public function testLessThan() 
	{
        $valid = eden('validation', 10)->lessThan(5);
        $this->assertFalse($valid);
	}
	
	public function testLessThanEqualTo() 
	{
        $valid = eden('validation', 10)->lessThanEqualTo(10);
        $this->assertTrue($valid);
	}
		
	public function testLengthGreaterThan() 
	{
        $valid = eden('validation', 'Something')->lengthGreaterThan(5);
        $this->assertTrue($valid);
	}
	
	public function testLengthGreaterThanEqualTo() 
	{
        $valid = eden('validation', 'Something')->lengthGreaterThanEqualTo(9);
        $this->assertTrue($valid);
	}
		
	public function testLengthLessThan() 
	{
        $valid = eden('validation', 'Something')->lengthLessThan(5);
        $this->assertFalse($valid);
	}
	
	public function testLengthLessThanEqualTo() 
	{
        $valid = eden('validation', 'Something')->lengthLessThanEqualTo(9);
        $this->assertTrue($valid);
	}
	
	public function testNotEmpty() 
	{
        $valid = eden('validation', 'Something')->notEmpty();
        $this->assertTrue($valid);
	}
	
	public function testStartsWithLetter() 
	{
        $valid = eden('validation', '9Something')->startsWithLetter();
        $this->assertFalse($valid);
	}
	
	public function testAlphaNumeric() 
	{
		$valid = eden('validation', '9Something')->alphaNumeric();
        $this->assertTrue($valid);
		
		$valid = eden('validation', '9 Something')->alphaNumeric();
        $this->assertFalse($valid);
	}
	
	public function testAlphaNumericUnderScore() 
	{
		$valid = eden('validation', '9_Something')->alphaNumericUnderScore();
        $this->assertTrue($valid);
		
		$valid = eden('validation', '9 Something')->alphaNumericUnderScore();
        $this->assertFalse($valid);
	}
	
	public function testAlphaNumericHyphen() 
	{
		$valid = eden('validation', '9-Something')->alphaNumericHyphen();
        $this->assertTrue($valid);
		
		$valid = eden('validation', '9_Something')->alphaNumericHyphen();
        $this->assertFalse($valid);
	}
	
	public function testAlphaNumericLine() 
	{
		$valid = eden('validation', '9_Someth-ing')->alphaNumericLine();
        $this->assertTrue($valid);
		
		$valid = eden('validation', '9 Some-th_ing')->alphaNumericLine();
        $this->assertFalse($valid);
	}
}