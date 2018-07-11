<?php

namespace Core;


use Controllers\SystemMessages;

class Application
{

  /**
   * @var Context
   */
  private $context;

  /**
   * @var SessionInterface
   */
  private $session;

  public function __construct(Context $context, SessionInterface $session)
  {

    $this->context = $context;
    $this->session = $session;

  }

  public function start()
  {

    if (!class_exists($this->context->getFullClassName())) {
      $this->context->setClassName(SystemMessages::class);
      $this->context->setMethodName('notFound');
    }

    $fullClassName = $this->context->getFullClassName();

    $view = new View();
    $obj = new $fullClassName($view);

    $params = $this->context->getParams();

    if (!method_exists($obj, $this->context->getMethodName())) {
      echo 'Not found';
      exit;
    }

    $ref = new \ReflectionMethod($obj, $this->context->getMethodName());

    foreach ($ref->getParameters() as $param) {

      $class = $param->getClass();
      if ($class) {
        $className = $class->getName();
        $classObj = new $className();
        try {
          $this->dataBind($_POST, $classObj);
        } catch (\Exceptions\ValidationException $e) {
          $this->session->addMessage($e->getMessage());
          // TODO Redirect to back
        }
        $params[] = $classObj;
      }

    }
    call_user_func_array([$obj, $this->context->getMethodName()], $params);
  }

  public function dataBind($dataParams, $dataObj)
  {

    $ref = new \ReflectionClass($dataObj);

    foreach ($ref->getProperties() as $property) {

      if (isset($dataParams[$property->getName()])) {

        $propValue = $dataParams[$property->getName()];
        $setterName = 'set' . ucfirst($property->getName());

        if ($ref->hasMethod($setterName)) {
          $dataObj->$setterName($propValue);
        } else {
          $property->setAccessible(true);
          $property->setValue($dataObj, $propValue);
        }
      }
    }
  }
}