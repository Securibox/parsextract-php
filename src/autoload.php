<?php
class Autoloader
{
	public static $classMap = array (
		'Securibox\ParseXtract'=> __DIR__ . '/Px',
		'Securibox\ParseXtract\Entities'=> __DIR__ . '/Px/Entities',
		'Securibox\ParseXtract\Http'=> __DIR__ . '/Http');
		
    public static function load($classFullName)
    {
		$namespaceParts = explode('\\', $classFullName);
		$class = $namespaceParts[sizeof($namespaceParts) - 1];	
		foreach(Autoloader::$classMap as $namespace => $path){
			$file = $path . '/' . $class . '.php';
			if(file_exists($file)){
				require_once ($file);
				
			}
		}
    }
	
	public function __construct(){
		spl_autoload_register(array($this, 'load'));
	}	
}

new Autoloader();