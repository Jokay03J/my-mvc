<?php
class Response
{
    public $status = 200;
    public $contentType = "text/plain";
    public mixed $data;

    function __construct(array $options = array())
    {
        if (isset($options["data"])) {
            $this->data = $options["data"];
        }
        if (isset($options["status"])) {
            $this->status = $options["status"];
        }
        if (isset($options["contentType"])) {
            $this->contentType = $options["contentType"];
        }
    }

    function json(mixed $data)
    {
        $json = json_encode($data);
        $this->contentType = "application/json";
        $this->data = $json;
    }

    function setData(mixed $data)
    {
        $this->data = $data;
    }

    function sendResponse()
    {
        http_response_code($this->status);
        header("Content-Type: " . $this->contentType);
        return $this->data;
    }
}
?>