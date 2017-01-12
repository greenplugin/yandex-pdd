<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 17:26
 */

namespace YandexPDD\Entity;

/**
 * Class DomainStatusResponse
 * @package YandexPDD\Entity
 */
class DomainStatusResponse extends AbstractYandexResponse
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
	protected $check_results;
	
	/**
	 * @var string
	 */
	protected $next_check;
	
	/**
	 * @var string
	 */
	protected $last_check;
	
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
		$this->setVar('check_results', $data);
		$this->setVar('next_check', $data);
		$this->setVar('last_check', $data);
		$this->setVar('secret_name', isset($data['secrets']) ? $data['secrets'] : [], 'name');
		$this->setVar('secret_content', isset($data['secrets']) ? $data['secrets'] : [], 'content');
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
	public function getCheckResults()
	{
		return $this->check_results;
	}
	
	/**
	 * @return string
	 */
	public function getNextCheck()
	{
		return $this->next_check;
	}
	
	/**
	 * @return string
	 */
	public function getLastCheck()
	{
		return $this->last_check;
	}
	
	/**
	 * @return string
	 */
	public function getSecretName()
	{
		return $this->secret_name;
	}
	
	/**
	 * @return string
	 */
	public function getSecretContent()
	{
		return $this->secret_content;
	}
	
}