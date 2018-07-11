<?php
/**
 * Created by PhpStorm.
 * User: darcoto
 * Date: 11/17/17
 * Time: 16:20
 */

namespace Core;


interface ContextInterface
{

  public function getClassName();

  public function setClassName($className);

  public function getMethodName();

  public function setMethodName($methodName);

  public function getFullClassName();

  public function getParams();

  public function setParams($params);

}