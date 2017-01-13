<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 13.01.17
 * Time: 1:30
 */

namespace YandexPDD\Entity;


class DNSCollectionResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $domain;
	/**
	 * @var DNSRecordItem[]
	 */
	protected $records;
	
	/**
	 * @return string
	 */
	public function getDomain()
	{
		return $this->domain;
	}
	
	/**
	 * @return DNSRecordItem[]
	 */
	public function getRecords()
	{
		return $this->records;
	}
	
	/**
	 * @param Object|array $data
	 *
	 * @return DNSCollectionResponse
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
		$this->setVar('success', $data);
		if(!isset($data['records'])) return $this;
		if(!is_array($data['records'])) return $this;
		foreach($data['records'] as $item){
			$record = new DNSRecordItem();
			$record->fill($item);
			$this->records[] = $record;
		}
		return $this;
	}
	
	/**
	 * @param string $query
	 *
	 * @return DNSRecordItem|DNSRecordItem[]|null
	 */
	public function findBySubDomain($query)
	{
		if(!$this->records){
			return null;
		}
		
		$results = [];
		foreach($this->records as $record){
			if($record->getSubdomain() == $query){
				$results[] = $record;
			}
		}
		
		if(count($results)){
			return (count($results) == 1) ? $results[0] : $results;
		}
		
		return null;
	}
}