<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 13:19
 */

namespace YandexPDD;

use YandexPDD\Entity\YandexEMailEntity;

class MailManager extends  BaseManager
{
	// TODO [GreenPlugin]: fill all responses to self;
	const HOST = 'https://pddimp.yandex.ru/api2/admin/email';
	
	/**
	 * @param $login
	 * @param $password
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function addEmail($login, $password)
	{
		return $this->postQuery(
			sprintf("%s/add", self::HOST),
			[
				'domain'=>$this->domain,
				'login' => $login,
				'password' => $password
			]
		);
	}
	
	/**
	 * @param int $page
	 * @param int $count
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function get($page = 1, $count = 30) {
		return $this->getQuery(
			sprintf(
				"%s/list?domain=%s&page=%d&on_page=%d",
				self::HOST,
				$this->domain,
				$page,
				$count
			)
		);
	}
	
	/**
	 * @param YandexEMailEntity $email
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function setEmail(YandexEMailEntity $email)
	{
		$query = $email->setDomain($this->domain)->serialize();
		return $this->postQuery(sprintf("%s/edit", self::HOST), $query);
	}
	
	/**
	 * @param $identifier string|integer
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function removeEmail($identifier)
	{
		$query = ['domain' => $this->domain];
		$query = array_merge($query, is_numeric($identifier) ? ['uid'=>$identifier] : ['login' => $identifier]);
		return $this->postQuery(sprintf("%s/del", self::HOST), $query);
	}
	
	/**
	 * @param $identifier string|integer
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getCounters($identifier)
	{
		$id = is_numeric($identifier) ? sprintf("uid=%n", $identifier) : sprintf("login=%s", $identifier);
		return $this->getQuery(sprintf(
			                       "%s/counters?domain=%s&%s",
			                       self::HOST,
			                       $this->domain,
			                       $id
		                       ));
	}
		
	
}