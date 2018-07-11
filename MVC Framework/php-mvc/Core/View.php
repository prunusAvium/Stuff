<?php

namespace Core;

class View implements ViewInterface
{

  const VIEW_FOLDER = 'View';
  const VIEW_EXTENSTION = '.php';

  function render(string $viewName, $model = null)
  {
    include self::VIEW_FOLDER . DIRECTORY_SEPARATOR . $viewName . self::VIEW_EXTENSTION;
  }
}