<?php

namespace App\Http\Controllers\API\v1\NFe;

use App\Models\NFe;
use App\Http\Controllers\Controller;
use App\Http\Requests\NFe\ShowNFeRequest;
use App\Http\Resources\NFe\NFeResource;
use App\Http\Resources\NFe\NFeResourceCollection;

/**
 * @OA\Info(title="Desafio Bolton - Arquivei API", version="1.0")
 */
class NFeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *     tags={"nfe"},
     *     path="/api/v1/nfes/",
     *     summary="Lista todas as nfes importadas",
     *     @OA\Response(
     *         response="200",
     *         description="Sucesso na listagem dos recursos",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/NFe")
     *         ),
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/NFe")
     *         ),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Requisicao invalida.",
     *         @OA\JsonContent(ref="#/components/schemas/BadRequest"),
     *         @OA\Schema(ref="#/components/schemas/BadRequest")
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Erro interno do Servidor.",
     *         @OA\JsonContent(ref="#/components/schemas/Error"),
     *         @OA\Schema(ref="#/components/schemas/Error")
     *     ),
     * )
     */
    public function index()
    {
        return (new NFeResourceCollection(NFe::all()))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NFe  $nFe
     * @param  \App\Http\Requests\NFe\ShowNFeRequest  $request
     * @return \Illuminate\Http\Response | \App\Http\Resources\NFe\NFeResource
     *
     *
     * @OA\Get(
     *     path="/api/v1/nfes/{nfe}",
     *     tags={"nfe"},
     *     summary="Exibe os dados da NFe a partir da Chave de Acesso fornecida",
     *     @OA\Parameter(
     *         name="nfe",
     *         in="path",
     *         description="Chave de Acesso",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Sucesso na exibicao da NFe",
     *         @OA\JsonContent(ref="#/components/schemas/NFe"),
     *         @OA\Schema(ref="#/components/schemas/NFe")
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Requisicao invalida.",
     *         @OA\JsonContent(ref="#/components/schemas/BadRequest"),
     *         @OA\Schema(ref="#/components/schemas/BadRequest")
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Recurso não encontrado.",
     *         @OA\JsonContent(ref="#/components/schemas/NotFound"),
     *         @OA\Schema(ref="#/components/schemas/NotFound")
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Erro interno do Servidor.",
     *         @OA\JsonContent(ref="#/components/schemas/Error"),
     *         @OA\Schema(ref="#/components/schemas/Error")
     *     ),
     * )
     */
    public function show(NFe $nfe, ShowNFeRequest $request)
    {
        return (new NFeResource($nfe))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NFe  $nFe
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, NFe $nFe)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NFe  $nFe
     * @return \Illuminate\Http\Response
     */
    // public function destroy(NFe $nFe)
    // {
    //     //
    // }
}
