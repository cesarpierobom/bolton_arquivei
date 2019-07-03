<?php

namespace App\Services\External\Arquivei\v1\NFe\Received;

use App\Interfaces\FetchNFeRequestInterface;

class FetchNFes implements FetchNFeRequestInterface
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function execute(array $query = null)
    {
        try {
            $response = $this->client->request(
                "GET",
                config("services.arquivei.domain") . "/v1/nfe/received",
                [
                    "headers" => config("services.arquivei.headers"),
                    "query" => $query
                ]
            );

            return $response->getBody();
        } catch (\GuzzleHttp\Exception\TransferException $exc) {
            throw new \Exception($exc->getMessage());
        }
    }
}
