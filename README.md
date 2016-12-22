## Usage

芝麻信用api

```php
require 'vendor\autoload.php';

use Monster\Zhima\Client;

$config = new Monster\Zhima\Config();
$config->setAppId('1001528');
$config->setPrivateKey(__DIR__ . '/rsa/rsa_private_key.pem');
$config->setZhimaPublicKey(__DIR__ . '/rsa/rsa_public_key.pem');
$config->setChannel('api');


$creditIvsDetail = new \Monster\Zhima\Handlers\CreditIvsDetail();
$creditIvsDetail->setCertNo('33022719xxxxxxxxxxx');
$creditIvsDetail->setName('张三');
$creditIvsDetail->setCertType('100');

$client = new Client(new \GuzzleHttp\Client(), $config);
$result = $client->with($creditIvsDetail)->fetch();

var_dump($result);
```
