<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 1:29
 */

namespace YandexPDD;

use YandexPDD\Entity\DNSCollectionResponse;
use YandexPDD\Entity\DNSRecordEntity;
use YandexPDD\Entity\DNSRecordItem;
use YandexPDD\Entity\DNSRecordResponse;

class DNSManager extends AbstractBaseManager
{
	// TODO [GreenPlugin]: add persistent collections an flush method;
	const HOST = 'https://pddimp.yandex.ru/api2/admin/dns';
		
	/**
	 * @return null|DNSCollectionResponse
	 */
	public function getRecords()
	{
		return $this->getQuery(
			sprintf("%s/list?domain=%s", self::HOST, $this->domain),
			new DNSCollectionResponse()
		);
	}
	
	/**
	 * @param DNSRecordEntity $recordEntity
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function createRecord(DNSRecordEntity $recordEntity)
	{
		$query = $recordEntity->setDomain($this->domain)->serialize();
		return $this->postQuery(sprintf("%s/add", self::HOST), $query, new DNSRecordResponse());
	}
	
	/**
	 * @param DNSRecordEntity $recordEntity
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function updateRecord(DNSRecordEntity $recordEntity)
	{
		// TODO [GreenPlugin]: add update by exist record
		$query = $recordEntity->setDomain($this->domain)->serialize();
		
		return $this->postQuery(sprintf("%s/edit", self::HOST), $query, new DNSRecordResponse());
	}
	
	/**
	 * @param DNSRecordItem $record
	 *
	 * @return mixed|null
	 */
	public function removeRecord($record)
	{
		// TODO [GreenPlugin]: add removing by id
		return $this->postQuery(
			sprintf("%s/del", self::HOST),
			[
				'domain'    => $this->domain,
				'record_id' => $record->getRecordId(),
			]
			, new DNSRecordResponse()
		);
	}
	
	/**
	 * @return DNSRecordEntity
	 */
	public function getNewRecord()
	{
		$record = new DNSRecordEntity();
		return $record->setDomain($this->domain);
	}
	
	/**
	 * @return null|DNSCollectionResponse
	 */
	public function getResponse()
	{
		return $this->response;
	}
}