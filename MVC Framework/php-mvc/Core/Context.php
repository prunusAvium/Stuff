<?php

namespace Core;


class Context implements ContextInterface
{

  private $className;

  private $methodName;

  private $params;

  /**
   * @return mixed
   */
  public function getClassName()
  {
    return $this->className;
  }

  /**
   * @param mixed $className
   */
  public function setClassName($className)
  {
    $this->className = ucfirst($className);
  }

  /**
   * @return mixed
   */
  public function getMethodName()
  {
    return $this->methodName;
  }

  /**
   * @param mixed $methodName
   */
  public function setMethodName($methodName)
  {
    $this->methodName = $methodName;
  }

  /**
   * @return mixed
   */
  public function getFullClassName()
  {
    return 'Controllers\\' . $this->getClassName() . 'Controller';
  }

  /**
   * @return mixed
   */
  public function getParams()
  {
    return $this->params;
  }

  /**
   * @param mixed $params
   */
  public function setParams($params)
  {
    $this->params = $params;
  }


}