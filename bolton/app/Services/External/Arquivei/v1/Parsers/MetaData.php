<?php

namespace App\Services\External\Arquivei\v1\Parsers;

class MetaData
{
    private $count;
    private $signature;
    private $page;

    public function __construct($arrayResponse)
    {
        if (empty($arrayResponse)) {
            throw new Exception("Invalid MetaData Response.");
        }

        if (isset($arrayResponse->count)) {
            $this->count = $arrayResponse->count;
        }

        if (isset($arrayResponse->signature)) {
            $this->signature = $arrayResponse->signature;
        }

        if (isset($arrayResponse->page)) {
            $this->page = new Page($arrayResponse->page);
        }
    }


    public function getCount()
    {
        return $this->count;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getPageNode()
    {
        return $this->pag;;
    }
}
