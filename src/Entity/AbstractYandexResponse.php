<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 15:27
 */

namespace YandexPDD\Entity;

/**
 * Class AbstractYandexResponse
 * @package YandexPDD\Entity
 */
Abstract class AbstractYandexResponse implements FillableInterface
{
	/**
	 * @var string
	 */
	protected $success = null;
	
	/**
	 * @return string
	 */
	public function getSuccess()
	{
		return $this->success;
	}
	
	/**
	 * @return bool
	 */
	public function isSuccess()
	{
		return $this->success == 'ok';
	}
	
	/**
	 * @param string      $var
	 * @param array       $array
	 * @param null|string $arrayKey
	 *
	 * @return AbstractYandexResponse
	 */
	protected function setVar($var, $array, $arrayKey = null)
	{
		$arrayKey     = $arrayKey ? $arrayKey : $var;
		$this->{$var} = isset($array[$arrayKey]) ? $array[$arrayKey] : null;
		
		return $this;
	}
	
}