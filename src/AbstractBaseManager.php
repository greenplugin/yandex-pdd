<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 10.01.17
 * Time: 1:30
 */

namespace YandexPDD;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use YandexPDD\Entity\FillableInterface;


/**
 * Class AbstractBaseManager
 * @package YandexPDD
 */
Abstract class AbstractBaseManager
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
	 * @var Client
	 */
	protected $client;
	
	/**
	 * @var bool
	 */
	protected $debug = false;
	
	/**
	 * @var null|string
	 */
	protected $error = null;
	
	/**
	 * @var bool
	 */
	protected $status = true;
	
	/**
	 * @var null|mixed
	 */
	protected $response = null;
		
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
		$this->client = new Client();
	}
	
	/**
	 * @param string $request
	 *
	 * @param mixed  $response
	 *
	 * @return mixed|ResponseInterface
	 */
	protected function getQuery($request, $response)
	{
		$result = $this->client->request(
			'GET',
			$request,
			[
				'headers'     => ['PddToken' => $this->apiKey],
				'http_errors' => $this->debug,
			]
		);
		
		return $this->processResponse($result, $response);
	}
	
	/**
	 * @param string $requestUrl
	 * @param array  $requestBody
	 *
	 * @param mixed  $response
	 *
	 * @return mixed|null
	 */
	protected function postQuery($requestUrl, $requestBody, $response)
	{
		$result = $this->client->request(
			'POST',
			$requestUrl,
			[
				'headers'     => ['PddToken' => $this->apiKey],
				'form_params' => $requestBody,
				'http_errors' => $this->debug,
			]
		);
		return $this->processResponse($result, $response);
		
	}
	
	/**
	 * @param ResponseInterface $response
	 *
	 * @param FillableInterface $responseObject
	 *
	 * @return mixed|null
	 */
	protected function processResponse(ResponseInterface $response, FillableInterface $responseObject)
	{
		if($response->getStatusCode() != 200){
			$this->error = $response->getStatusCode();
			$this->response = null;
			return null;
		}
		
		$result = json_decode($response->getBody()->getContents(), true);
		
		if($result == null){
			$this->error = 'bad_json';
			$this->response = null;
			return null;
		}
		
		if($result['success'] === 'error'){
			$this->error = $result['error'];
			$this->response = null;
			return null;
		}
		
		$this->response = $responseObject->fill($result);
		
		return $responseObject;
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
	 * @return AbstractBaseManager
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
	 * @return AbstractBaseManager
	 */
	public function setDomain($domain)
	{
		$this->domain = $domain;
		
		return $this;
	}
	
	/**
	 * @return null|string
	 */
	public function getError()
	{
		return $this->error;
	}
	
	/**
	 * @return boolean
	 */
	public function isStatus()
	{
		return $this->status;
	}
	
	/**
	 * @return null|mixed
	 */
	abstract public function getResponse();
	
}