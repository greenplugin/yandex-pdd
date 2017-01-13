<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 13.01.17
 * Time: 2:47
 */

namespace YandexPDD\Entity;


class DNSRecordResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @var DNSRecordItem
	 */
	protected $record;
	
	/**
	 * @var integer
	 */
	protected $record_id;
	
	/**
	 * @return string
	 */
	public function getDomain()
	{
		return $this->domain;
	}
	
	/**
	 * @return DNSRecordItem
	 */
	public function getRecord()
	{
		return $this->record;
	}
	
	/**
	 * @return int
	 */
	public function getRecordId()
	{
		return $this->record_id;
	}
	
	
	/**
	 * @param Object|array $data
	 *
	 * @return DNSRecordResponse
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
		$this->setVar('record_id', $data);
		$this->setVar('success', $data);
		if(!isset($data['record'])) return $this;
		if(!is_array($data['record'])) return $this;
		$this->record = new DNSRecordItem();
		$this->record->fill($data['record']);
		return $this;
	}
}