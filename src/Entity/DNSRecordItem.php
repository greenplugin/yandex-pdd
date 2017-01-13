<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 13.01.17
 * Time: 1:29
 */

namespace YandexPDD\Entity;


class DNSRecordItem implements FillableInterface
{
	/**
	 * @var integer
	 */
	protected $record_id;
	
	/**
	 * @var string
	 */
	protected $type;
	
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @var string
	 */
	protected $fqdn;
	
	/**
	 * @var integer
	 */
	protected $ttl;
	
	/**
	 * @var string
	 */
	protected $subdomain;
	
	/**
	 * @var string
	 */
	protected $content;
	
	/**
	 * @var integer
	 */
	protected $priority;
	
	/**
	 * @var integer
	 */
	protected $retry;
	
	/**
	 * @var integer
	 */
	protected $refresh;
	
	/**
	 * @var string
	 */
	protected $admin_mail;
	
	/**
	 * @var integer
	 */
	protected $expire;
	
	/**
	 * @var integer
	 */
	protected $minttl;
	
	/**
	 * @var integer
	 */
	protected $weight;
	
	/**
	 * @var string
	 */
	protected $port;
	
	/**
	 * @var string
	 */
	protected $operation;
	
	/**
	 * @return int
	 */
	public function getRecordId()
	{
		return $this->record_id;
	}
	
	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @return string
	 */
	public function getDomain()
	{
		return $this->domain;
	}
	
	/**
	 * @return string
	 */
	public function getFqdn()
	{
		return $this->fqdn;
	}
	
	/**
	 * @return int
	 */
	public function getTtl()
	{
		return $this->ttl;
	}
	
	/**
	 * @return string
	 */
	public function getSubdomain()
	{
		return $this->subdomain;
	}
	
	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}
	
	/**
	 * @return int
	 */
	public function getPriority()
	{
		return $this->priority;
	}
	
	/**
	 * @return int
	 */
	public function getRetry()
	{
		return $this->retry;
	}
	
	/**
	 * @return int
	 */
	public function getRefresh()
	{
		return $this->refresh;
	}
	
	/**
	 * @return string
	 */
	public function getAdminMail()
	{
		return $this->admin_mail;
	}
	
	/**
	 * @return int
	 */
	public function getExpire()
	{
		return $this->expire;
	}
	
	/**
	 * @return int
	 */
	public function getMinttl()
	{
		return $this->minttl;
	}
	
	/**
	 * @return int
	 */
	public function getWeight()
	{
		return $this->weight;
	}
	
	/**
	 * @return string
	 */
	public function getPort()
	{
		return $this->port;
	}
	
	/**
	 * @return string
	 */
	public function getOperation()
	{
		return $this->operation;
	}
		
	/**
	 * @param Object|array $data
	 *
	 * @return DNSRecordItem
	 */
	public function fill($data)
	{
		foreach($data as $key => $value){
			$key = str_replace(['-'], ['_'], $key);
			if(property_exists($this, $key)){
				$this->{$key} = $value;
			}
		}
		return $this;
	}
}