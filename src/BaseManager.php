<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 1:30
 */

namespace YandexPDD;

use GuzzleHttp\Client;

/**
 * Class BaseManager
 * @package YandexPDD
 */
class BaseManager
{
	/**
	 * @var string
	 */
	protected $domain;
	
	/**
	 * @var string
	 */
	protected $apiKey;
	
	/**
	 * @var bool
	 */
	protected $debug = false;
		
	/**
	 * BaseManager constructor.
	 *
	 * @param string $apiKey
	 * @param string $domain
	 */
	public function __construct($apiKey, $domain)
	{
		$this->apiKey = $apiKey;
		$this->domain = $domain;
	}
	
	/**
	 * @return Client
	 */
	protected function getClient()
	{
		return new Client();
	}
	
	/**
	 * @param string $request
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	protected function getQuery($request)
	{
		$client = $this->getClient();
		return $client->request(
			'GET',
			$request,
			[
				'headers'     => ['PddToken' => $this->apiKey],
				'http_errors' => $this->debug,
			]
		);
	}
	
	/**
	 * @param string $requestUrl
	 * @param array $requestBody
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	protected function postQuery($requestUrl, $requestBody)
	{
		$client = $this->getClient();
		return $client->request(
			'POST',
			$requestUrl,
			[
				'headers'     => ['PddToken' => $this->apiKey],
				'form_params' => $requestBody,
				'http_errors' => $this->debug,
			]
		);
	}
	
	/**
	 * @return boolean
	 */
	public function isDebug()
	{
		return $this->debug;
	}
	
	/**
	 * @param boolean $debug
	 *
	 * @return BaseManager
	 */
	public function setDebug($debug)
	{
		$this->debug = $debug;
		
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
	 * @param string $domain
	 *
	 * @return BaseManager
	 */
	public function setDomain($domain)
	{
		$this->domain = $domain;
		
		return $this;
	}
	
}