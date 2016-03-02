<?php

namespace Serrex\RestBunble\Response;

use Serrex\RestBunble\Contracts\ResponseInterface;

class Error implements ResponseInterface
{
    private $status = "error";
    private $statusCode;
    private $message;
    private $errorMessages;

    /**
     * Error json response
     * @param  integer $statusCode Standed HTTP status code
     * @param  Array|array $errorMessages Custom error messages
     * @internal param Errors $code Errors insterface constan variable
     */
    public function __construct(array $errorMessages = [], $statusCode = 400)
    {
        $this->statusCode = $statusCode;
        $this->errorMessages = $errorMessages;
        return $this;
    }

    public function send()
    {
        return (new JsonMessageBuilder())
            ->error()
            ->errors($this->errorMessages)
            ->code($this->statusCode)
            ->send();
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessages()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getJson()
    {
        return json_encode($this->data);
    }
}
