<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 13:00
 */

namespace YandexPDD\Entity;

/**
 * Class DomainCollectionItem
 * @package YandexPDD\Entity
 */
class DomainCollectionItem implements FillableInterface
{
	/**
	 * @var null|string
	 */
	private $status = null;
	
	/**
	 * @var null|string
	 */
	private $from_registrar = null;
	
	/**
	 * @var null|string
	 */
	private $name = null;
	
	/**
	 * @var null|string
	 */
	private $ws_technical = null;
	
	/**
	 * @var bool
	 */
	private $logo_enabled = false;
	
	/**
	 * @var bool
	 */
	private $master_admin = false;
	
	/**
	 * @var bool
	 */
	private $nsdelegated = false;
	
	/**
	 * @var null|integer
	 */
	private $email_max_count = null;
	
	/**
	 * @var null|integer
	 */
	private $emails_count = null;
	
	/**
	 * @var bool
	 */
	private $dkim_ready = false;
	
	/**
	 * @var null|string
	 */
	private $logo_url = null;
	
	/**
	 * @var null|string
	 */
	private $stage = null;
	
	/**
	 * @var null|array
	 */
	private $aliases = null;
	
	
	/**
	 * @param Object|array $data
	 *
	 * @return DomainCollectionItem
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