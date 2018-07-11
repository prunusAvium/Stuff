<?php

session_start();

spl_autoload_register();

$url = $_SERVER['REQUEST_URI'];

$self = str_replace('index.php','',$_SERVER['PHP_SELF']);
$url = explode('/',str_replace($self,'',$url));

$className = array_shift($url);
$methodName = array_shift($url);

$context = new \Core\Context();
$context->setClassName($className);
$context->setMethodName($methodName);
$context->setParams($url);

$session = new \Core\Session($_SESSION,function (){
  session_destroy();
});

$application = new \Core\Application($context,$session);
$application->start();
