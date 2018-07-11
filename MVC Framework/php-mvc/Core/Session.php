<?php
/**
 * Created by PhpStorm.
 * User: darcoto
 * Date: 11/16/17
 * Time: 17:02
 */

namespace Core;


class Session implements SessionInterface
{

  /**
   * @var callable
   */
  private $destroyer;

  /**
   * @var array
   */
  public $session;

  public function __construct(array $session, callable $destroyer)
  {
    $this->session = $session;
    $this->destroyer = $destroyer;
  }

  public function destroy()
  {
    $this->destroyer();
  }

  public function addMessage(string $text)
  {
    $this->session['messages'][] = $text;
  }

  public function getMessages()
  {
    return $this->session['messages'];
  }

}