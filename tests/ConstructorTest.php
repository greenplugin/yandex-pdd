<?php

/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 11:49
 */

namespace YandexPDD\Tests;

use YandexPDD\Constructor;

class ConstructorTest extends \PHPUnit_Framework_TestCase
{
	
	protected $key;
	
	protected $domain;
	
	/**
	 * @param  $class
	 *
	 * @dataProvider  testProvider
	 */
	public function testPower($class)
	{
		$constructor = new Constructor('empty_key');
		$result = call_user_func([$constructor, $class], 'domain.com');
		var_dump($result, true);
	}
	
	public function testProvider()
	{
		return [
			['getDNSManager'],
			['getDomainManager'],
			['getMailManager'],
		];
	}
	
}
