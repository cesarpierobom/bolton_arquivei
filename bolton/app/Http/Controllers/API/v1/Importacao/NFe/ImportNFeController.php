<?php

namespace App\Http\Controllers\API\v1\Importacao\NFe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Importacao\NFe\ImportNFeRequest;
use App\Services\ImportNFesArquivei;
use App\Services\External\Arquivei\v1\NFe\Received\FetchNFes;
use App\Services\CreateNFeService;
use App\Repositories\NFeRepository;

class ImportNFeController extends Controller
{
    /**
     * Import several NFes from Arquivei's API
     *
     * @param  \App\Http\Requests\Importacao\NFe\ImportNFeRequest  $request
     */
    public function import(ImportNFeRequest $request)
    {
        try {
            $importer = new ImportNFesArquivei(
                new FetchNFes(new \GuzzleHttp\Client()),
                new CreateNFeService(new NFeRepository())
            );
    
            $result = $importer->execute();
        } catch (\Exception $exc) {
            throw $exc;
        }
    }
}
