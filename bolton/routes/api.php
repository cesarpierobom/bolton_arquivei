<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get("/v1/nfes/{nfe}", 'API\v1\NFe\NFeController@show')->name("nfe.show");

Route::get("/v1/nfes/", 'API\v1\NFe\NFeController@index')->name("nfe.index");

Route::post("/v1/nfes/arquivei/import", 'API\v1\Importacao\NFe\ImportNFeController@import')->name("nfe.import");

Route::fallback(function () {
    return response()->json(["code"=>"404", "message" => "Not Found."], 404);
})->name("api.fallback.404");
