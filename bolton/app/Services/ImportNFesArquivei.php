<?php

namespace App\Services;

use App\Interfaces\FetchNFeRequestInterface;
use App\Interfaces\CreateNFeServiceInterface;
use App\Services\External\Arquivei\v1\Parsers\FetchNFeResponse;
use App\Services\External\Arquivei\v1\Parsers\NFeList;
use App\Services\External\Arquivei\v1\Parsers\XML\NFe;

class ImportNFesArquivei
{
    private $requestService;
    private $createService;

    public function __construct(FetchNFeRequestInterface $requestService, CreateNFeServiceInterface $createService)
    {
        $this->requestService = $requestService;
        $this->createService = $createService;
    }

    public function execute(array $data = null)
    {
        try {
            $response = $this->requestService->execute($data);
            $arrayResponse = json_decode($response);

            $parsedResponse = new FetchNFeResponse($arrayResponse);

            if ($parsedResponse->getStatusNode()->getCode() != "200") {
                throw new \Exception("There was an error with the request.");
            }

            $list = $parsedResponse->getDataNode();
            
            $this->iterateNFeList($list);

            return true;
        } catch (\Exception $exc) {
            throw $exc;
        }
    }

    private function iterateNFeList(NFeList $list)
    {
        $newList = $list->getListNode();

        foreach ($newList as $record) {
            $xml = new NFe($record->getXML());

            $data = array(
                "access_key" => $record->getAccessKey(),
                "value" => $xml->getValue()
            );

            $this->create($data);
        }
    }

    private function create($data)
    {
        $this->createService->execute($data);
    }
}