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
     * 
     * @OA\Post(
     *     path="/api/v1/nfes/arquivei/import",
     *     tags={"nfe"},
     *     operationId="import",
     *     summary="Importa NFes do Arquivei",
     *     description="Solicita a importacao de NFes atraves da integração com o Arquivei",
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Quantidade maxima de nfes que serão retornadas",
     *         required=false,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         ),
     *     ),
     *     @OA\Parameter(
     *         name="cursor",
     *         in="query",
     *         description="Posição do cursor a partir da qual a pesquisa será iniciada.",
     *         required=false,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Sucesso na importacao",
     *          @OA\JsonContent(ref="#/components/schemas/OK"),
     *          @OA\Schema(ref="#/components/schemas/OK")
     *      ),
     *     @OA\Response(
     *          response="500",
     *          description="Erro interno do servidor",
     *          @OA\JsonContent(ref="#/components/schemas/Error"),
     *          @OA\Schema(ref="#/components/schemas/Error")
     *      ),
     *     @OA\Response(
     *          response="502",
     *          description="Erro com a API Externa",
     *          @OA\JsonContent(ref="#/components/schemas/BadGateway"),
     *          @OA\Schema(ref="#/components/schemas/BadGateway")
     *      ),
     *     @OA\Response(
     *          response="400",
     *          description="Requisição invalida",
     *          @OA\JsonContent(ref="#/components/schemas/BadRequest"),
     *          @OA\Schema(ref="#/components/schemas/BadRequest")
     *      ),
     * )
     */
    public function import(ImportNFeRequest $request)
    {
        try {
            $importer = new ImportNFesArquivei(
                new FetchNFes(new \GuzzleHttp\Client()),
                new CreateNFeService(new NFeRepository())
            );
    
            $result = $importer->execute();

            return response()->json(["code"=>"200", "message" => "OK"], 200);
        } catch (\Exception $exc) {
            return response()->json(["code"=>"502", "message" => "Bad Gateway"], 502);
        }
    }
}
