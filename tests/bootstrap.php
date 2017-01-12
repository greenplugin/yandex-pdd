<?php
namespace YandexPDD\Tests;

require __DIR__ . '/../vendor/autoload.php';

class HasToString
{
	public function __toString() {
		return 'bar';
	}
}