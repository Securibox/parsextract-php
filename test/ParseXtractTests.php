<?php 
namespace Securibox;
require(__DIR__.'/../vendor/autoload.php');

use Securibox\ParseXtract\ApiClient;
use Securibox\ParseXtract\Entities;
use PHPUnit\Framework\TestCase;

class ParseXtractTests extends TestCase{


    public function testparse(){
        $document = Entities\Document::LoadFromPath("C:\\Path\\To\\file.pdf");
        $client = new ApiClient("Client_Id", "Client_Secret");
        $resp = $client->Parse($document);
        $this->assertInstanceOf(Entities\ParsingResult::class, $resp);
        $this->assertGreaterThan(0, sizeof($resp->XData));
        var_dump($resp);
    }

}