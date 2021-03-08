# parsextract-php
[![Packagist Version][packagist-image]][packagist-url]

A PHP client library for the [ParseXtract API][1]

## Install Package
Securibox ParseXtract PHP wrapper is installed via [Composer](http://getcomposer.org).
Simply run the following command:
```bash
composer require securibox/parsextract
```

#### Alternative: Install package from zip
If you are not using Composer, simply download and install the **[latest packaged release of the library as a zip](https://github.com/Securibox/parsextract-php/archive/master.zip)**.

## Authentication
In order to call PX-Studio API, you need to provide a client_id and a client_secret that you can retrieve from the Settings section of PX-Studio.

## Getting started
The following is the minimum needed code to list all agent details and fields:
```php
<?php 
// If you are using Composer (recommended)
require 'vendor/autoload.php';
use Securibox\ParseXtract\ApiClient;
use Securibox\ParseXtract\Entities;

// If you are not using Composer
// require("path/to/parsextract-php/src/autoload.php");

$document = Entities\Document::LoadFromPath("C:\\Path\\To\\file.pdf");
$client = new ApiClient("Client_Id", "Client_Secret");
$result = $client->Parse($document);

foreach($result->XData as $XData){
    print("\n\n");
    print("Name: ".$XData->name."\n");
    print("Value: ".$XData->value."\n");
}
```

## License
[MIT][2]

[1]: https://www.securibox.eu/en/px/index.html
[2]: https://github.com/Securibox/parsextract-php/blob/master/LICENSE
[packagist-image]: https://img.shields.io/badge/packagist-1.0.2-blue.svg
[packagist-url]: https://packagist.org/packages/securibox/parsextract