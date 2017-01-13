<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 12:50
 */

namespace YandexPDD\Entity;

/**
 * Class DomainCollectionResponse
 * @package YandexPDD\Entity
 */
class DomainCollectionResponse extends AbstractYandexResponse
{
	/**
	 * @var string
	 */
	protected $direction = null;
	
	/**
	 * @var integer
	 */
	protected $on_page = null;
	
	/**
	 * @var DomainCollectionItem
	 */
	protected $domains = null;
	
	/**
	 * @var integer
	 */
	protected $found = null;
	
	/**
	 * @var integer
	 */
	protected $total = null;
	
	/**
	 * @var integer
	 */
	protected $page = null;
	
	/**
	 * @var string
	 */
	protected $order = null;
	
	/**
	 * @param Object|array $data
	 *
	 * @return DomainCollectionResponse
	 */
	public function fill($data)
	{
		$this->setVar('direction', $data)
		     ->setVar('found', $data)
		     ->setVar('order', $data)
		     ->setVar('success', $data)
		     ->setVar('page', $data)
		     ->setVar('on_page', $data)
		     ->setVar('total', $data);
		
		foreach($data['domains'] as $domain){
			$item = new DomainCollectionItem();
			$item->fill($domain);
			$this->domains[] = $item;
		}
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDirection()
	{
		return $this->direction;
	}
	
	/**
	 * @return int
	 */
	public function getOnPage()
	{
		return $this->on_page;
	}
	
	/**
	 * @return DomainCollectionItem
	 */
	public function getDomains()
	{
		return $this->domains;
	}
	
	/**
	 * @return int
	 */
	public function getFound()
	{
		return $this->found;
	}
	
	/**
	 * @return int
	 */
	public function getTotal()
	{
		return $this->total;
	}
	
	/**
	 * @return int
	 */
	public function getPage()
	{
		return $this->page;
	}
	
	/**
	 * @return string
	 */
	public function getOrder()
	{
		return $this->order;
	}
	
}