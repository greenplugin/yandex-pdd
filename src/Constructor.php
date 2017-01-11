<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 2:01
 */

namespace YandexPDD;

/**
 * Class Manager
 * @package YandexPDD
 */
class Constructor
{
	// TODO [GreenPlugin]: write entities for all responses
	// TODO [GreenPlugin]: add all api methods
	/**
	 * @var string
	 */
	private $key;
	
	/**
	 * @var DomainManager[]
	 */
	private $domainManagers;
	
	/**
	 * @var DNSManager[]
	 */
	private $DNSManagers;
	
	/**
	 * @var MailManager[]
	 */
	private $mailManagers;
	
	/**
	 * Constructor constructor.
	 *
	 * @param $key
	 */
	public function __construct($key)
	{
		$this->key = $key;
	}
	
	/**
	 * @param string $domain
	 *
	 * @return DomainManager
	 */
	public function domainManager($domain = '')
	{
		$manager                = new DomainManager($this->key, $domain);
		$this->domainManagers[] = $manager;
		
		return $manager;
	}
	
	/**
	 * @param $domain
	 *
	 * @return DNSManager
	 */
	public function dnsManager($domain)
	{
		$manager             = new DNSManager($this->key, $domain);
		$this->DNSManagers[] = $manager;
		
		return $manager;
	}
	
	/**
	 * @param $domain
	 *
	 * @return MailManager
	 */
	public function mailManager($domain)
	{
		$manager              = new MailManager($this->key, $domain);
		$this->mailManagers[] = $manager;
		
		return $manager;
	}
	
	/**
	 * @return DomainManager[]
	 */
	public function getDomainManagers()
	{
		return $this->domainManagers;
	}
	
	/**
	 * @return DNSManager[]
	 */
	public function getDnsManagers()
	{
		return $this->DNSManagers;
	}
	
	/**
	 * @return MailManager[]
	 */
	public function getMailManagers()
	{
		return $this->mailManagers;
	}
	
	
}