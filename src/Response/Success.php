<?php

namespace Serrex\RestBunble\Response;

use Serrex\RestBunble\Contracts\ResponseInterface;

class Success implements ResponseInterface
{
    private $status = "success";
    private $data;
    private $code = 200;
    private $message;

    /**
     * Success Json response
     * @param array|Array $data response content
     * @param  String $message custom success massege if needed
     * @param int $code
     */
    public function __construct($data = [], $message = null, $code = 200)
    {
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
        return $this;
    }

    public function send()
    {
        return (new JsonMessageBuilder())
            ->success()
            ->code($this->code)
            ->data($this->data)
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

    public function getJson()
    {
        return json_encode($this->data);
    }

    public function getData()
    {
        return $this->data;
    }
}
