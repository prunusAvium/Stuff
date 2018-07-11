<?php


namespace Core;


class Template implements TemplateInterface
{


    const TEMPLATE_NAME = 'App/Templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data)
    {
        require_once self::TEMPLATE_NAME . $templateName . self::TEMPLATES_EXTENSION;
    }
}