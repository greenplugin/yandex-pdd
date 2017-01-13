<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 17:39
 */

namespace YandexPDD\Entity;

/**
 * Class DomainDetailsResponse
 * @package YandexPDD\Entity
 */
class DomainDetailsResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @var string
	 */
	protected $status;
	
	/**
	 * @var string
	 */
	protected $stage;
	
	/**
	 * @var string
	 */
	protected $delegated;
	
	/**
	 * @var string
	 */
	protected $country;
	
	/**
	 * @var integer
	 */
	protected $pop_enabled;
	
	/**
	 * @var integer
	 */
	protected $imap_enabled;
	
	/**
	 * @var string
	 */
	protected $default_theme;
	
	/**
	 * @param Object|array $data
	 *
	 * @return FillableInterface
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
		$this->setVar('status', $data);
		$this->setVar('stage', $data);
		$this->setVar('delegated', $data);
		$this->setVar('country', $data);
		$this->setVar('pop_enabled', $data);
		$this->setVar('imap_enabled', $data);
		$this->setVar('default_theme', $data);
		$this->setVar('success', $data);
		return $this;
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
	public function getStatus()
	{
		return $this->status;
	}
	
	/**
	 * @return string
	 */
	public function getStage()
	{
		return $this->stage;
	}
	
	/**
	 * @return string
	 */
	public function getDelegated()
	{
		return $this->delegated;
	}
	
	/**
	 * @return string
	 */
	public function isDelegated()
	{
		return $this->delegated == 'yes';
	}
	
	/**
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}
	
	/**
	 * @return int
	 */
	public function getPopEnabled()
	{
		return $this->pop_enabled;
	}
	
	/**
	 * @return int
	 */
	public function isPopEnabled()
	{
		return $this->pop_enabled == 1;
	}
	
	/**
	 * @return int
	 */
	public function getImapEnabled()
	{
		return $this->imap_enabled;
	}
	
	/**
	 * @return bool
	 */
	public function isImapEnabled()
	{
		return $this->imap_enabled == 1;
	}
	
	/**
	 * @return string
	 */
	public function getDefaultTheme()
	{
		return $this->default_theme;
	}
	
}