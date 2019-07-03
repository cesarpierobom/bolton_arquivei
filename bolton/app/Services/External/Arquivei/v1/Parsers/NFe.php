<?php

namespace App\Services\External\Arquivei\v1\Parsers;

class NFe
{
    private $access_key;
    private $xml;

    public function __construct($arrayResponse)
    {
        if (empty($arrayResponse)) {
            throw new Exception("Invalid NFe Response.");
        }

        if (isset($arrayResponse->access_key)) {
            $this->access_key = $arrayResponse->access_key;
        }

        if (isset($arrayResponse->xml)) {
            $this->xml = $arrayResponse->xml;
        }
    }


    public function getAccessKey()
    {
        return $this->access_key;
    }

    public function getXml()
    {
        return $this->xml;
    }
}
