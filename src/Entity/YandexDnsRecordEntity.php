<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 15:01
 */

namespace YandexPDD\Entity;

/**
 * Class YandexDnsRecordEntity
 * @package YandexPDD\Entity
 */
class YandexDnsRecordEntity implements SerializableInterface
{
	const
		TYPE_SRV = 'SRV',
		TYPE_TXT = 'TXT',
		TYPE_NS = 'NS',
		TYPE_MX = 'MX',
		TYPE_SOA = 'SOA',
		TYPE_A = 'A',
		TYPE_AAAA = 'AAAA',
		TYPE_CNAME = 'CNAME';
	
	/**
	 * @var null|string
	 */
	private $domain = null;
	
	/**
	 * @var null|string
	 */
	private $subdomain = null;
	
	/**
	 * @var null|string
	 */
	private $type = null;
	
	/**
	 * @var null|string
	 */
	private $admin_mail = null;
	
	/**
	 * @var null|string
	 */
	private $content = null;
	
	/**
	 * @var null|string
	 */
	private $priority = null;
	
	/**
	 * @var null|string
	 */
	private $weight = null;
	
	/**
	 * @var null|string
	 */
	private $port = null;
	
	/**
	 * @var null|string
	 */
	private $target = null;
	
	/**
	 * @var null|integer
	 */
	private $ttl = null;
	
	/**
	 * @var null|integer
	 */
	private $refresh = null;
	
	/**
	 * @var null|integer
	 */
	private $retry = null;
	
	/**
	 * @var null|integer
	 */
	private $expire = null;
	
	/**
	 * @var null|integer
	 */
	private $neg_cache = null;
	
	/**
	 * @var null|integer
	 */
	private $record_id = null;
	
	
	/**
	 * @return null|string
	 */
	public function getDomain()
	{
		return $this->domain;
	}
	
	/**
	 * @param null|string $domain
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setDomain($domain)
	{
		$this->domain = $domain;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @param string $type
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setType($type)
	{
		$this->type = $type;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getAdminMail()
	{
		return $this->admin_mail;
	}
	
	/**
	 * @param null|string $admin_mail
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setAdminMail($admin_mail)
	{
		$this->admin_mail = $admin_mail;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getContent()
	{
		return $this->content;
	}
	
	/**
	 * @param null|string $content
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setContent($content)
	{
		$this->content = $content;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getPriority()
	{
		return $this->priority;
	}
	
	/**
	 * @param null|string $priority
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setPriority($priority)
	{
		$this->priority = $priority;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getWeight()
	{
		return $this->weight;
	}
	
	/**
	 * @param null|string $weight
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setWeight($weight)
	{
		$this->weight = $weight;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getPort()
	{
		return $this->port;
	}
	
	/**
	 * @param null|string $port
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setPort($port)
	{
		$this->port = $port;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getTarget()
	{
		return $this->target;
	}
	
	/**
	 * @param null|string $target
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setTarget($target)
	{
		$this->target = $target;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getSubdomain()
	{
		return $this->subdomain;
	}
	
	/**
	 * @param null|string $subdomain
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setSubdomain($subdomain)
	{
		$this->subdomain = $subdomain;
		
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getTtl()
	{
		return $this->ttl;
	}
	
	/**
	 * @param int $ttl
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setTtl($ttl)
	{
		$this->ttl = $ttl;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getRefresh()
	{
		return $this->refresh;
	}
	
	/**
	 * @param int|null $refresh
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setRefresh($refresh)
	{
		$this->refresh = $refresh;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getRetry()
	{
		return $this->retry;
	}
	
	/**
	 * @param int|null $retry
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setRetry($retry)
	{
		$this->retry = $retry;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getExpire()
	{
		return $this->expire;
	}
	
	/**
	 * @param int|null $expire
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setExpire($expire)
	{
		$this->expire = $expire;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getNegCache()
	{
		return $this->neg_cache;
	}
	
	/**
	 * @param int|null $neg_cache
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setNegCache($neg_cache)
	{
		$this->neg_cache = $neg_cache;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getRecordId()
	{
		return $this->record_id;
	}
	
	/**
	 * @param int|null $record_id
	 *
	 * @return YandexDnsRecordEntity
	 */
	public function setRecordId($record_id)
	{
		$this->record_id = $record_id;
		
		return $this;
	}
	
	/**
	 * @throws RequiredArgumentException
	 */
	public function serialize()
	{
		$result = [];
		foreach($this as $key=>$val){
			if($this->isVar($val)){
				$result[$key] = $val;
			}
		}
		return $result;
	}
	
	private function isVar($var){
		return ($var === null) ? false : true;
	}
}