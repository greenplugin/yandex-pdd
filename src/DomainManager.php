<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 0:57
 */

namespace YandexPDD;
use YandexPDD\Entity\DomainCollectionResponse;
use YandexPDD\Entity\DomainConnectionResponse;
use YandexPDD\Entity\DomainCountryResponse;
use YandexPDD\Entity\DomainDetailsResponse;
use YandexPDD\Entity\DomainLogoResponse;
use YandexPDD\Entity\DomainStatusResponse;
use YandexPDD\Entity\SimpleResponse;


/**
 * Class DomainManager
 * @package YandexPDD
 */
class DomainManager extends AbstractBaseManager
{
	// TODO [GreenPlugin]: fill all responses to self;
	// TODO [GreenPlugin]: fix setDomainLogo method
	const HOST = 'https://pddimp.yandex.ru/api2/admin/domain';
	
	/**
	 * @param int $page  = 1
	 * @param int $count = 20
	 * @param string $direction = asc
	 *
	 * @return DomainCollectionResponse
	 */
	public function get($page = 1, $count = 20, $direction = 'asc')
	{
		return $this->getQuery(sprintf(
			"%s/domains?page=%d&on_page=%d&direction=%s",
			self::HOST, 
			$page, 
			$count, 
			$direction),
            new DomainCollectionResponse()
		);
	}
	
	/**
	 * @param string $domain
	 *
	 * @return DomainConnectionResponse
	 */
	public function register($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(
			sprintf("%s/register", self::HOST),
			['domain' => $domain],
			new DomainConnectionResponse()
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
			['domain' => $domain],
			new SimpleResponse()
		);
	}
	
	/**
	 * @param string $domain
	 *
	 * @return null|DomainStatusResponse
	 */
	public function getStatus($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->getQuery(
			sprintf("%s/registration_status?domain=%s", self::HOST, $domain),
			new DomainStatusResponse()
		);
	}
	
	/**
	 * @param string $domain
	 *
	 * @return DomainDetailsResponse|null
	 */
	public function getDetails($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->getQuery(
			sprintf("%s/details?domain=%s", self::HOST, $domain),
			new DomainDetailsResponse()
		);
	}
	
	/**
	 * @param string $country in ISO-3166-1 https://ru.wikipedia.org/wiki/ISO_3166-1
	 * @param string $domain
	 *
	 * @return DomainCountryResponse|null
	 */
	public function setCountry($country, $domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(
			sprintf("%s/settings/set_country", self::HOST),
			[
				'domain' => $domain,
				'country' => $country
			],
			new DomainCountryResponse()
		);
	}
	
	/**
	 * @param string $domain
	 * @param string $path
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function setDomainLogo($path, $domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		$mime = mime_content_type($path);
		$file = file_get_contents($path);
		$result = $this->client->request(
		'POST',
		sprintf("%s/logo/set", self::HOST),
		[
			'multipart' => [
				[
					'name'=> 'domain',
					'contents' => $domain
				],
				[
					'name'     => 'file',
					'filename' => 'logo',
					'contents' => $file,
					'headers'  => [
						'Content-Type' => $mime,
					],
				]

			],
			'headers'     => ['PddToken' => $this->apiKey],
			'http_errors' => $this->debug,
		]
		);
		return $this->processResponse($result, new SimpleResponse());
	}
	
	/**
	 * @param string $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getDomainLogo($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->getQuery(sprintf("%s/logo/check?domain=%s", self::HOST, $domain), new DomainLogoResponse());
	}
	
	/**
	 * @param $domain
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function removeDomainLogo($domain = null)
	{
		$domain = $domain ? $domain : $this->domain;
		return $this->postQuery(sprintf("%s/logo/del", self::HOST), ['domain' => $domain], new SimpleResponse());
	}
	
	/**
	 * @return null|DomainCollectionResponse|DomainConnectionResponse
	 */
	public function getResponse()
	{
		return $this->response;
	}
}