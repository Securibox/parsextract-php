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

  namespace Securibox\ParseXtract\Entities;
  /**
 * Represents data extracted from the document
 */

 class ParsingResult {
    /** @var string Document name or identifier */
    public $fileName;

    /** @var array[XData] array of data extracted from the document */
    public $XData;

    public static function LoadFromJson($jsonData){
        $jsonData = (object)Utils::camelCaseArrayKeys($jsonData);
        $obj = new ParsingResult();
        $obj->fileName = $jsonData->fileName;
        $obj->XData = XData::LoadFromJsonArray($jsonData->xData);
        return $obj;
    }
 }