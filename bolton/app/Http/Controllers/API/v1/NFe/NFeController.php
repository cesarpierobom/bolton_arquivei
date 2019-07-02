<?php

namespace App\Http\Controllers\API\v1\NFe;

use App\Models\NFe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NFe\ShowNFeRequest;
use App\Http\Resources\NFe\NFeResource;
use App\Http\Resources\NFe\NFeResourceCollection;

class NFeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
