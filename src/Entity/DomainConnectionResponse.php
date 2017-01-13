<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 15:36
 */

namespace YandexPDD\Entity;

/**
 * Class DomainConnectionResponse
 * @package YandexPDD\Entity
 */
class DomainConnectionResponse extends AbstractYandexResponse
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
	protected $secret_name;
	
	/**
	 * @var string
	 */
	protected $secret_content;
	
	
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
		$this->setVar('secret_name', isset($data['secrets']) ? $data['secrets'] : [], 'name');
		$this->setVar('secret_content', isset($data['secrets']) ? $data['secrets'] : [], 'content');
		$this->setVar('success', $data);
		return $this;
	}
}