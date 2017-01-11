<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 0:57
 */

namespace YandexPDD;


/**
 * Class DomainManager
 * @package YandexPDD
 */
class DomainManager extends BaseManager
{
	// TODO [GreenPlugin]: fill all responses to self;
	// TODO [GreenPlugin]: fix setDomainLogo method
	const HOST = 'https://pddimp.yandex.ru/api2/admin/domain';
	
	/**
	 * @param int $page  = 1
	 * @param int $count = 20
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function get($page = 1, $count = 20)
	{
		return $this->getQuery(sprintf("%s/domains?page=%d&on_page=%d", self::HOST, $page, $count));
	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function register($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(
			sprintf("%s/register", self::HOST),
			['domain' => $domain]
		);
	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function remove($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(
			sprintf("%s/delete", self::HOST),
			['domain' => $domain]
		);
	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getStatus($domain = null)
	{
		return $this->getQuery(sprintf("%s/registration_status?domain=%s", self::HOST, $domain));
	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getDetails($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->getQuery(sprintf("%s/details?domain=%s", self::HOST, $domain));
	}
	
	/**
	 * @param string $country in ISO-3166-1 https://ru.wikipedia.org/wiki/ISO_3166-1
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function setDomainCountry($country, $domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(
			sprintf("%s/settings/set_country", self::HOST),
			[
				'domain' => $domain,
				'country' => $country
			]
		);
	}
	
	/**
	 * @param string $domain
	 * @param string $filename
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
//	public function setDomainLogo($domain, $filename)
//	{
//		$client = $this->getClient();
//		$file = Storage::get($filename);
//		return $client->request(
//		'POST',
//		sprintf("%s/logo/set", self::HOST),
//		[
//			'multipart' => [
//				['domain'=> $domain],
//				[
//					'name'     => 'file',
//					'filename' => 'logo',
//					'contents' => $file,
//					'headers'  => [
//						'Content-Type' => 'image/jpeg',
//					],
//				]
//
//			],
//			'headers'     => ['PddToken' => config('yandex_api.key')],
//			'http_errors' => config('app.debug'),
//		]
//		);
//	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getDomainLogo($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->getQuery(sprintf("%s/logo/check?domain=%s", self::HOST, $domain));
	}
	
	/**
	 * @param $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function removeDomainLogo($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(sprintf("%s/logo/del", self::HOST), ['domain' => $domain]);
	}
	
}