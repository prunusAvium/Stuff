<?php

namespace Core;


interface SessionInterface
{

  public function destroy(callable $destroyer);

  public function addMessage(string $text);

  public function getMessages();
}