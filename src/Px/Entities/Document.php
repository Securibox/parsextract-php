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

use Exception;

/**
 * Object representing a document to parse
 */

 class Document {
    /** @var string document name or identifier */
    public $fileName;

    /** @var string document content base64 encoded */
    public $base64Content ;

    public static function LoadFromPath($filePath){
        if(file_exists($filePath)){
            $document = new Document();
            $document->fileName = basename($filePath);
            $document->base64Content = base64_encode(file_get_contents($filePath));
            return $document;
        }
        throw new Exception("Could not find file '$filePath'.");
    }
 }