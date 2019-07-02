<?php

namespace App\Services;

use App\Interfaces\CreateNFeServiceInterface;
use App\Interfaces\NFeRepositoryInterface;
use App\Models\NFe;

class CreateNFeService implements CreateNFeServiceInterface
{
    private $repo;

    public function __construct(NFeRepositoryInterface $repository)
    {
        $this->repo = $repository;
    }
    
    public function execute(array $data)
    {
        $result = $this->repo->checkExistsByAccessKey($data["access_key"]);

        if ($result) {
            return $result;
        }

        $record = NFe::create(
            [
                "access_key" => $data["access_key"],
                "value" => $data["value"]
            ]
        );

        return $record;
    }
}
