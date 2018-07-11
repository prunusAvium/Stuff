<?php
/**
 * Created by PhpStorm.
 * User: al3ex
 * Date: 26.5.2018 г.
 * Time: 12:43 ч.
 */

namespace Core;


interface TemplateInterface
{
    public function render(string $templateName, $data);
}