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
 * Object with utilities
 */
class Utils{

    public static function isAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public static function camelCaseArrayKeys($array){
        if(!is_array($array) && !is_object($array)){
            return $array;
        }
        $retArray = array();
        foreach($array as $key => $item){
            if(is_object($item) || is_array($item)){
                $item = Utils::camelCaseArrayKeys($item);
                if(!Utils::isAssoc($item)){
                    for($i=0; $i < sizeof($item); $i++){
                        $item[$i] = (object)$item[$i];
                    }
                }
            }
            $retArray[lcfirst($key)] = $item;
        }
        return $retArray;
    }

    public static function endsWith($haystack, $needle) {
        $length = strlen($needle);
        return $length > 0 ? substr($haystack, -$length) === $needle : true;
    }
}
 ?>