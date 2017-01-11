<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 13:43
 */

namespace YandexPDD\Entity;

class YandexEMailEntity implements SerializableInterface
{
	
	const
		SEX_FEMALE = 2,
		SEX_MALE = 1,
		SEX_UNDEFINED = 0;
	
	/**
	 * @var null|string
	 */
	private $domain = null;
	
	/**
	 * @var string "%login@domain.com%"|"%login%"
	 */
	private $login = null;
	
	/**
	 * @var null|integer
	 */
	private $uid = null;
	
	/**
	 * @var string
	 */
	private $password = null;
	
	/**
	 * @var string
	 */
	private $iname = null;
	
	/**
	 * @var string
	 */
	private $fname = null;
	
	/**
	 * @var string "yes"|"no"
	 */
	private $enabled = null;
	
	/**
	 * @var string in date format "YYYY-MM-DD"
	 */
	private $birth_date = null;
	
	/**
	 * @var integer  0|1|2
	 */
	private $sex = null;
		
	/**
	 * @var null|string
	 */
	private $hintq = null;
	
	/**
	 * @var null|string
	 */
	private $hinta = null;
	
	/**
	 * @return null|string
	 */
	public function getDomain()
	{
		return $this->domain;
	}
	
	/**
	 * @param null|string $domain
	 *
	 * @return YandexEMailEntity
	 */
	public function setDomain($domain)
	{
		$this->domain = $domain;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getLogin()
	{
		return $this->login;
	}
	
	/**
	 * @param string $login
	 *
	 * @return YandexEMailEntity
	 */
	public function setLogin($login)
	{
		$this->login = $login;
		
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getUid()
	{
		return $this->uid;
	}
	
	/**
	 * @param int|null $uid
	 *
	 * @return YandexEMailEntity
	 */
	public function setUid($uid)
	{
		$this->uid = $uid;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}
	
	/**
	 * @param string $password
	 *
	 * @return YandexEMailEntity;
 */
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getIname()
	{
		return $this->iname;
	}
	
	/**
	 * @param string $iname
	 *
	 * @return YandexEMailEntity
	 */
	public function setIname($iname)
	{
		$this->iname = $iname;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFname()
	{
		return $this->fname;
	}
	
	/**
	 * @param string $fname
	 *
	 * @return YandexEMailEntity
	 */
	public function setFname($fname)
	{
		$this->fname = $fname;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEnabled()
	{
		return $this->enabled;
	}
	
	/**
	 * @param string $enabled
	 *
	 * @return YandexEMailEntity
	 */
	public function setEnabled($enabled)
	{
		$this->enabled = $enabled;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getBirthDate()
	{
		return $this->birth_date;
	}
	
	/**
	 * @param string $birthDate
	 *
	 * @return YandexEMailEntity
	 */
	public function setBirthDate($birthDate)
	{
		$this->birth_date = $birthDate;
		
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getSex()
	{
		return $this->sex;
	}
	
	/**
	 * @param int $sex
	 *
	 * @return YandexEMailEntity
	 */
	public function setSex($sex)
	{
		$this->sex = $sex;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getHintq()
	{
		return $this->hintq;
	}
	
	/**
	 * @param null|string $hintq
	 *
	 * @return YandexEMailEntity
	 */
	public function setHintq($hintq)
	{
		$this->hintq = $hintq;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getHinta()
	{
		return $this->hinta;
	}
	
	/**
	 * @param null|string $hinta
	 *
	 * @return YandexEMailEntity
	 */
	public function setHinta($hinta)
	{
		$this->hinta = $hinta;
		
		return $this;
	}
	
	
	/**
	 * @return array
	 */
	public function serialize()
	{
		$serialized = [];
		
		if($this->uid){
			$this->login = null;
		}
		
		foreach($this as $key => $var){
			if($this->isVar($var)){
				$serialized[$key] = $var;
			}
		}
		
		return $serialized;
	}
	
	private function isVar($var){
		return ($var === null) ? false : true;
	}
}