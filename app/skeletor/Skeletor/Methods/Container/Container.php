<?php
use \Aura\Di\Container;
use \Aura\Di\Forge;
use \Aura\Di\Config;
$di = new Container(new Forge(new Config));


//$di->set('jsonService', new \Skeletor\Package\jsonService('whatever'));
