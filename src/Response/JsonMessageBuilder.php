<?php
namespace Serrex\RestBunble\Response;

class JsonMessageBuilder
{
    private $status  = "success";
    private $data    = array();
    private $errors  = array();
    private $code    = null;

    public function __construct(
        array $data = array(),
        array $errors = array(),
        $code = null
    ) {
        $this->data    = $data;
        $this->errors  = $errors;
        $this->code    = $code;
    }

    public function success()
    {
        $this->status  = "success";
        return $this;
    }

    public function error()
    {
        $this->status  = "error";
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function code($code)
    {
        $this->code  = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function errors($errors)
    {
        $this->errors = $errors;
        return $this;
    }

    public function data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getArray()
    {
        $errors = empty($this->errors) ? null : $this->errors;

        $response = array(
            'status' => $this->getStatus(),
            'data'   => $this->data,
            'errors' => $errors,
        );

        if (!is_null($this->code)) {
            $response['code'] = $this->code;
        }

        if ($this->getStatus() == "error") {
            unset($response['data']);
        }

        return $response;
    }

    public function send()
    {
        return response(json_encode($this->getArray()), $this->getCode())
            ->header('Content-Type', 'application/json');
    }
}
