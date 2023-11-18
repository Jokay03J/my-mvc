<?php
final class Request
{
    public string $method = "GET";
    public string $uri;
    public array $params = [];
    public array $query = [];
    public array $files = [];
    public array $body = [];
    public string $ip = "";

    function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->uri = $_SERVER["REQUEST_URI"];
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $this->files = $_FILES;
        $this->body = $_POST;
        $this->query = $_GET;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
?>