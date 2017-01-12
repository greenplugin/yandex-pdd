<?php

/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 11:49
 */

namespace YandexPDD\Tests;

use YandexPDD\Constructor;
use YandexPDD\DNSManager;
use YandexPDD\DomainManager;
use YandexPDD\MailManager;

class ConstructorTest extends \PHPUnit_Framework_TestCase
{
	
	protected $key;
	
	protected $domain;
	
	/**
	 * @param $class
	 *
	 * @dataProvider testProvider
	 */
	public function testPower($class)
	{
		global $argv, $argc;
		$this->assertGreaterThan(3, $argc, 'use with key and domain');
		$this->key = $argv[2];
		$this->domain = $argv[3];
		
		$constructor = new Constructor($this->key);
		$result = call_user_func([$constructor, $class], $this->domain);
		var_dump($result, true);
	}
	
	public function testProvider()
	{
		return [
			['DNSManager'],
			['DomainManager'],
			['MailManager'],
		];
	}
	
}
