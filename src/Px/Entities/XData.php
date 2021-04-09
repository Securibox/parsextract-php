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

 class XData {
    /** @var string data name */
    public $name;

    /** @var string extracted value */
    public $value;

    public static function LoadFromJson($jsonData){
        $obj = new XData();
        $obj->name = $jsonData->name;
        if(Utils::endsWith($obj->name, '.Table')){
            $obj->value = XDataTable::LoadFromJson($jsonData->value);
        }else{
            $obj->value = $jsonData->value;
        }
        return $obj;
    }

    public static function LoadFromJsonArray($jsonObjects){
        $objects = array();
        for($i = 0; $i < sizeof($jsonObjects); $i++){
            $object = XData::LoadFromJson($jsonObjects[$i]);
            array_push($objects, $object);
        }
        return $objects;
    }
 }