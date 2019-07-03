<?php

namespace App\Services\External\Arquivei\v1\Parsers;

class Status
{
    private $code;
    private $message;

    public function __construct($arrayResponse)
    {
        if (empty($arrayResponse)) {
            throw new Exception("Invalid Status Response.");
        }

        if (isset($arrayResponse->code)) {
            $this->code = $arrayResponse->code;
        }

        if (isset($arrayResponse->message)) {
            $this->message = $arrayResponse->message;
        }
    }


    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
