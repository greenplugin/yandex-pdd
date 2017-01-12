<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 18:47
 */

namespace YandexPDD\Entity;

/**
 * Class DomainLogoResponse
 * @package YandexPDD\Entity
 */
class DomainLogoResponse extends AbstractYandexResponse
{
	protected $domain;
	
	protected $logo_url;
	
	/**
	 * @param Object|array $data
	 *
	 * @return FillableInterface
	 */
	public function fill($data)
	{
		$this->setVar('domain', $data);
		$this->setVar('logo_url', $data, 'logo-url');
		$this->setVar('success', $data);
		
		return $this;
	}
}