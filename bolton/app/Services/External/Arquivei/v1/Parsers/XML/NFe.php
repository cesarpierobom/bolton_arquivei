<?php

namespace App\Services\External\Arquivei\v1\Parsers\XML;

class NFe
{
    private $value;

    public function __construct($xml = null)
    {
        if (empty($xml)) {
            return $this;
        }

        $this->parse($xml);
    }

    private function decode64($base64)
    {
        return base64_decode($base64);
    }

    private function decodeXMLString($xmlString)
    {
        return simplexml_load_string($xmlString);
    }

    public function parse($xml)
    {
        $base64decoded = $this->decode64($xml);

        $nota = $this->decodeXMLString($base64decoded);

        $value = $nota->NFe->infNFe->total->ICMSTot->vNF->__toString();

        $this->value = number_format($value, 10, ".", "");

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

}
