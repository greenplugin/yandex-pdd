<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 12:43
 */

namespace YandexPDD\Tests;


use YandexPDD\Constructor;
use YandexPDD\Entity\CountryInterface;
use YandexPDD\Entity\DNSRecordEntity;

class DNSManagerTest extends \PHPUnit_Framework_TestCase
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

		$dm = $pdd->getDNSManager($domain);
		$records = $dm->getRecords();

		echo "\n";
		foreach($records->getRecords() as $record){
			echo $record->getType() . ' | ' . $record->getFqdn() . ' = ' . $record->getContent() ."\n";
		}

		//$dm = $pdd->getDNSManager($domain);
		//$id = $dm->getRecords()->findBySubDomain('ftp')->getRecordId();
			
//		$record = $dm->getNewRecord()
//			->setSubdomain('ftp')
//			->setRecordId($id)
//			->setType(DNSRecordEntity::TYPE_CNAME)
//			->setContent('mpsrdp.myvnc.com.');
//
//		var_dump($dm->updateRecord($record));
//		foreach($records as $record){
//			print_r($dm->removeRecord($record));
//		}
		

	}
	
	
}
