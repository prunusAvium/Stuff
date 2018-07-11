<?php


namespace App\Http;


use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function render(string $templateName, $data = null)
    {
        return $this->render($templateName, $data);
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}