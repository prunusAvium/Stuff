<?php

namespace Controllers;


use Core\View;

class SystemMessages
{

  /**
   * @var View
   */
  private $view;

  public function __construct($view)
  {
    $this->view = $view;
  }

  public function notFound()
  {
    $this->view->render('system_notfound');
  }
}