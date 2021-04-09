<?php
/**
  * ParseXtract library
  *
  * PHP version 5.4
  *
  * @author    João Rodrigues <joao.rodrigues@securibox.eu>
  * @copyright 2021 Securibox
  * @license   https://opensource.org/licenses/MIT The MIT License
  * @version   GIT: https://github.com/Securibox/parsextract-php
  * @link      http://packagist.org/packages/securibox/parsextract
  */

namespace Securibox\ParseXtract;

use Exception;
use Securibox\ParseXtract\Http;
use Securibox\ParseXtract\Entities;
use Securibox\ParseXtract\Entities\Document;

/**
* Provides methods to call PX-Studio Parse API.
*/
class ApiClient
{
    private $httpClient;

    /**
    * Initialize the client
    *
    * @param string $username     basic username
    * @param array  $password     basic password
    * @param string $apiEndpoint  the base url (e.g. https://sca-multitenant.securibox.eu/api/v1)
    */
    public function __construct($clientId, $clientSecret, $logger = null, $curlVerbose = false){
        $curlOptions = null;
        if($curlVerbose){
            $curlOptions = [41 => true];
        }
        $this->httpClient = new Http\HttpClient("https://px-api.securibox.eu", null, null, ["api"], $curlOptions, $clientId, $clientSecret, $logger);
    }

    /**
    * Calls the Parse API.
    *
    * @param Document $document Document to be parsed.
    *
    * @return ParsingResult The parsing result.
    */
    public function Parse(Document $document){
        $response = $this->httpClient->parse()->post($document);
        $jsonData = json_decode($response->body());
        if($response->statusCode() >= 400){
            throw new Exception($response->statusCode());
        }
        return Entities\ParsingResult::LoadFromJson($jsonData);
    }
}
?>
