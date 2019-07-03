<?php

namespace App\Services\External\Arquivei\v1\Parsers;

class Page
{
    private $next;
    private $previous;

    public function __construct($arrayResponse)
    {
        if (empty($arrayResponse)) {
            throw new Exception("Invalid Page Response.");
        }

        if (isset($arrayResponse->next)) {
            $this->next = $arrayResponse->next;
        }

        if (isset($arrayResponse->previous)) {
            $this->previous = $arrayResponse->previous;
        }
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getPrevious()
    {
        return $this->previous;
    }
}
