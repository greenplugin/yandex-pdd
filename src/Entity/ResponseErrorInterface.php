<?php
/**
 * Created by PhpStorm.
 * User: GreenPlugin
 * Date: 12.01.17
 * Time: 15:44
 */

namespace YandexPDD\Entity;

/**
 * Interface ResponseErrorInterface
 * @package YandexPDD\Entity
 */
Interface ResponseErrorInterface
{
	const
		ERROR_UNKNOWN = 'unknown',
		ERROR_NO_TOKEN = 'no_token',
		ERROR_BAD_DOMAIN = 'bad_domain',
		ERROR_PROHIBITED = 'prohibited',
		ERROR_BAD_TOKEN = 'bad_token',
		ERROR_NO_AUTH = 'no_auth',
		ERROR_NOT_ALLOWED = 'not_allowed',
		ERROR_BLOCKED = 'blocked',
		ERROR_OCCUPIED = 'occupied',
		ERROR_DOMAIN_LIMIT_REACHED = 'domain_limit_reached',
		ERROR_NO_REPLY = 'no_reply',
		ERROR_BAD_JSON = 'bad_json';
}