<?php

namespace App\Services\External\Arquivei\v1\Parsers;

use App\Services\External\Arquivei\v1\Parsers\NFe;

class NFeList
{
    private $list;

    public function __construct($arrayResponse)
    {
        if (!empty($arrayResponse) && !empty($arrayResponse[0]) && !empty($arrayResponse[0]->access_key)) {
            foreach ($arrayResponse as $xml) {
                $this->list[] = new NFe($xml);
            }
        }
    }


    public function getListNode()
    {
        return $this->list;
    }
}
