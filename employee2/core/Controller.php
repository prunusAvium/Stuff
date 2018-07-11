<?php
declare(strict_types=1);
abstract class Controller
{
    protected $db = null;
    protected $action = null;
    protected $controller = null;
    /**
     * Controller constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        if (isset($this->inputGet()['action'])) {
            $this->action = $this->inputGet()['action'];
        }
        if (isset($this->inputGet()['controller'])) {
            $this->controller = $this->inputGet()['controller'];
        }
        $this->db = $db;
    }
    /**
     * @return mixed
     */
    abstract public function main();
    /**
     * @param string $filename
     * @param array|null $params
     */
    public function loadView(string $filename, array $params = null)
    {
        if (file_exists("view/" . $filename)) {
            include "view/" . "$filename";
        }
    }
    /**
     * @return array
     */
    public function inputGet(): array
    {
        $input = array();
        foreach ($_GET as $key => $value) {
            $input[$key] = filter_var($_GET[$key], FILTER_SANITIZE_STRING);
        }
        return $input;
    }
    /**
     * @return array
     */
    public function inputPost(): array
    {
        $input = array();
        foreach ($_POST as $key => $value) {
            $input[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
        }
        return $input;
    }
    /**
     * @return array
     */
    public function inputRequest(): array
    {
        $input = array();
        foreach ($_REQUEST as $key => $value) {
            $input[$key] = filter_var($_REQUEST[$key], FILTER_SANITIZE_STRING);
        }
        return $input;
    }
}