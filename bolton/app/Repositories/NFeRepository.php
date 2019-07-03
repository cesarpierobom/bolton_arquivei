<?php

namespace App\Repositories;

use App\Models\NFe;
use App\Interfaces\NFeRepositoryInterface;

class NFeRepository implements NFeRepositoryInterface
{
    public function checkExistsByAccessKey($access_key)
    {
        return NFe::where("access_key", $access_key)->first();
    }
}