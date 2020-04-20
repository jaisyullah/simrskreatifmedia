<?php
/**
 * Created by PhpStorm.
 * User: Vinícius Muniz
 * Date: 01/06/18
 * Time: 15:32
 */

class mail
{
    var $driver;
    public function __construct($driver)
    {
        $this->driver = $driver;
        $this->loadDriver();
    }

    public function loadDriver()
    {
        $file = __DIR__."drivers/".$this->driver . ".php";
        if(!file_exists($file))
        {
            return "Error Driver don't exists!";
        }
        include_once($file);
    }

    public function send(){}
    public function getSettings(){}


}