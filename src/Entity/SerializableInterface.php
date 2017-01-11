<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 14:01
 */

namespace YandexPDD\Entity;


interface SerializableInterface
{
	/**
	 * @return array
	 */
	public function serialize();
	
}