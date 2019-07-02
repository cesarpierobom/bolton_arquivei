<?php

namespace App\Services\External\Arquivei\v1\Parsers;

class FetchNFeResponse
{
    private $metaData;
    private $status;
    private $data;

    public function __construct($arrayResponse = null)
    {
        if (empty($arrayResponse)) {
            return $this;
        }
        
        $this->parse($arrayResponse);
    }

    public function parse($arrayResponse)
    {
        if (empty($arrayResponse)) {
            throw new Exception("Invalid Fetch NFe Response.");
        }

        if (isset($arrayResponse->status)) {
            $this->status = new Status($arrayResponse->status);
        }

        if (isset($arrayResponse->data)) {
            $this->data = new NFeList($arrayResponse->data);
        }

        if (isset($arrayResponse->count)) {
            $this->metaData = new MetaData($arrayResponse);
        }
    }

    public function getStatusNode()
    {
        return $this->status;
    }

    public function getDataNode()
    {
        return $this->data;
    }

    public function getMetaDataNode()
    {
        return $this->metaData;
    }
}
