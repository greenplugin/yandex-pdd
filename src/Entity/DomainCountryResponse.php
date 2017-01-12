<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 18:18
 */

namespace YandexPDD\Entity;


class DomainCountryResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @var string;
	 */
	protected $country;
	
	/**
	 * @param Object|array $data
	 *
	 * @return FillableInterface
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
		$this->setVar('country', $data);
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
	public function getCountry()
	{
		return $this->country;
	}
	
}