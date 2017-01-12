<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 18:11
 */

namespace YandexPDD\Entity;

/**
 * Class SimpleResponse
 * @package YandexPDD\Entity
 */
class SimpleResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @param Object|array $data
	 *
	 * @return FillableInterface
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
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
	
}