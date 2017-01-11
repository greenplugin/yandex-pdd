PHP Yandex PDD
=

This is simple way to use Yandex PDD api

How to use
=
```php
$pdd = new Constructor('your api key');
$dm = $pdd->domainManager('domain.example');
$dm->get();
```