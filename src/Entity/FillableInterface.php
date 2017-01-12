<?php
/**
 * Created by PhpStorm.
 * User: dobro
 * Date: 12.01.17
 * Time: 12:56
 */

namespace YandexPDD\Entity;

/**
 * Interface FillableInterface
 * @package YandexPDD\Entity
 */
interface FillableInterface
{
	/**
	 * @param Object|array $data
	 *
	 * @return FillableInterface
	 */
	public function fill($data);
}