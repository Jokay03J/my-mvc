<?php
class Response
{
    public $status = 200;
    public $contentType = "text/plain";
    public mixed $data;

    function __construct(mixed $data, array $options = array())
    {
        $this->data = $data;
        if (is_int($options["status"])) {
            $this->status = $options["status"];
        }
        if (is_string($options["contentType"])) {
            $this->contentType = $options["contentType"];
        }
    }

    function json(mixed $data)
    {
        $json = json_encode($data);
        $this->contentType = "application/json";
        $this->data = $json;
    }

    function sendResponse()
    {
        http_response_code($this->status);
        header("Content-Type: " . $this->contentType);
        return $this->data;
    }
}
?>