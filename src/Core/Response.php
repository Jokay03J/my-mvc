<?php
class Response
{
    /**
     * Response status code
     */
    public $status = 200;
    /**
     * Reponse content-type
     */
    public $contentType = "text/plain";
    /**
     * Response data
     */
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

    /**
     * Set response content-type
     */
    function setContentType(int $statusCode)
    {
        $this->status = $statusCode;
    }

    /**
     * Encode data to valid json and update content type of the response
     */
    function json(mixed $data)
    {
        $json = json_encode($data);
        $this->contentType = "application/json";
        $this->data = $json;
    }

    /**
     * Set reponse data
     */
    function setData(mixed $data)
    {
        $this->data = $data;
    }

    /**
     * update php request status code and return response data
     */
    function sendResponse()
    {
        http_response_code($this->status);
        header("Content-Type: " . $this->contentType);
        return $this->data;
    }
}
?>