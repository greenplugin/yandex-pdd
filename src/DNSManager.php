<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 1:29
 */

namespace YandexPDD;

class DNSManager extends BaseManager
{
	// TODO [GreenPlugin]: fill all responses to self;
	const HOST = 'https://pddimp.yandex.ru/api2/admin/dns';
		
	/**
	 * @return mixed|\Psr\Http\Message\ResponseInterface.
	 */
	public function getRecords()
	{
		return $this->getQuery(sprintf("%s/list?domain=%s", self::HOST, $this->domain));
	}
	
	/**
	 * @param YandexDnsRecordEntity $recordEntity
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function createRecord(YandexDnsRecordEntity $recordEntity)
	{
		$query = $recordEntity->setDomain($this->domain)->serialize();
		
		return $this->postQuery(sprintf("%s/add", self::HOST), $query);
	}
	
	/**
	 * @param YandexDnsRecordEntity $recordEntity
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function updateRecord(YandexDnsRecordEntity $recordEntity)
	{
		$query = $recordEntity->setDomain($this->domain)->serialize();
		
		return $this->postQuery(sprintf("%s/edit", self::HOST), $query);
	}
	
	public function removeRecord($recordId)
	{
		return $this->postQuery(sprintf("%s/del", self::HOST), [
			'domain' => $this->domain,
			'record_id' => $recordId
		]);
	}
	
	/**
	 * @param $record
	 * @param $value
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function editRecordLegacy($record, $value)
	{
		return $this->postQuery(
			sprintf("%s/edit", self::HOST),
			[
				'domain'    => $this->domain,
				'record_id' => $record,
				'content'   => $value,
			]
		);
	}
}