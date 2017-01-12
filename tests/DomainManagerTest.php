<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 12:43
 */

namespace YandexPDD\Tests;


use YandexPDD\Constructor;
use YandexPDD\Entity\CountryInterface;

class DomainManagerTest extends \PHPUnit_Framework_TestCase
{
	/**
	 *
	 */
	public function testGetDomains()
	{
		global $argv, $argc;
		$this->assertGreaterThan(3, $argc, 'use with key and domain');
		$key = $argv[2];
		$domain = $argv[3];

		$pdd = new Constructor($key);
		$dm = $pdd->DomainManager($domain);
		var_dump($dm->get());
//		var_dump($dm->register());
//		var_dump($dm->getError());
//		var_dump($dm->getStatus());
//		var_dump($dm->getDetails());
//		var_dump($dm->remove());
//		var_dump($dm->setCountry(CountryInterface::COUNTRY_KZ)->isSuccess());
//		var_dump($dm->getError());
//		var_dump($dm->setDomainLogo('/home/dobro/Рабочий стол/logo.png'));
//		var_dump($dm->getDomainLogo());
//		var_dump($dm->removeDomainLogo());
	}
	
	
}
