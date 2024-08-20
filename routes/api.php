<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Forecast;
use App\Http\Controllers\XmlController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/forecasts', function () {
    $forecasts = Forecast::all();

    return response()->xml(['forecasts' => $forecasts->toArray()]);
});

Route::post('/send-xml', [XmlController::class, 'sendXml']);

// For an API route
//Route::middleware('auth:api')->get('/send-xml-data', [XmlController::class, 'sendXml']);




