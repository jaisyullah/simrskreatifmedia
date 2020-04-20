<?php
spl_autoload_register(function($className)
{
    $package = 'Adldap';
    $className = ltrim($className, '\\');
	
    if (0 === strpos($className, $package))
	{
        $className = substr($className, strlen($package));
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        //echo $fileName;
        if (is_file($fileName))
		{
            require $fileName;
            return true;
        }
    }
    return false;
});
?>
