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
 * Represents datatable extracted from the document
 */

 class XDataTable {
    /** @var string data name */
    public $headers;

    /** @var string extracted value */
    public $values;

    public static function LoadFromJson($rawJsonData){
        $tables = array();
        $jsonTables = json_decode($rawJsonData);
        foreach($jsonTables as $jsonTable){
            $obj = new XDataTable();
            $obj->headers = $jsonTable->header;
            
            $tableData = $jsonTable->data;
            $obj->values = array();
            for($i = 0; $i < sizeof($tableData); $i++){
                for($j = 0; $j < sizeof($obj->headers); $j++){
                    $obj->values[$i][$obj->headers[$j]] = $tableData[$i][$j];
                }
            }
            array_push($tables, $obj);
        }
        return $tables;
    }

    public static function LoadFromJsonArray($jsonObjects){
        $objects = array();
        for($i = 0; $i < sizeof($jsonObjects); $i++){
            $object = XDataTable::LoadFromJson($jsonObjects[$i]);
            array_push($objects, $object);
        }
        return $objects;
    }

    
 }