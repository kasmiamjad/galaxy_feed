<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('forecasts', ForecastController::class);
//Route::post('forecasts/import', [ForecastController::class, 'import'])->name('forecasts.import');
//Route::get('forecasts/import', [ForecastController::class, 'import'])->name('forecasts.import');
// Route to display the list of forecasts
Route::get('forecasts', [ForecastController::class, 'index'])->name('forecasts.index');

// Route to show the form for creating a new forecast
Route::get('forecasts/create', [ForecastController::class, 'create'])->name('forecasts.create');

// Route to store a new forecast in the database
Route::post('forecasts', [ForecastController::class, 'store'])->name('forecasts.store');

// Route to show the form for editing an existing forecast
Route::get('forecasts/{forecast}/edit', [ForecastController::class, 'edit'])->name('forecasts.edit');

// Route to update an existing forecast in the database
Route::put('forecasts/{forecast}', [ForecastController::class, 'update'])->name('forecasts.update');

// Route to delete a forecast from the database
Route::delete('forecasts/{forecast}', [ForecastController::class, 'destroy'])->name('forecasts.destroy');

// Import form view route (GET request)

// Handle import logic (POST request)

// Route::get('/forecasts/import', [ForecastController::class, 'import'])->name('forecasts.import');
Route::post('/forecasts/import', [ForecastController::class, 'processImport'])->name('forecasts.import.process');

// Route to show the import form
Route::get('forecasts/import', [ForecastController::class, 'import'])->name('forecasts.import');

// Route to handle the file upload and show the preview
Route::post('forecasts/process', [ForecastController::class, 'processImport'])->name('forecasts.process');

// Route to handle the actual data import and save to the database
Route::post('forecasts/confirm', [ForecastController::class, 'confirmImport'])->name('forecasts.confirm');

Route::get('forecasts/data', [ForecastController::class, 'getData'])->name('forecasts.data');

Route::get('/forecasts/{forecast}/edit', [ForecastController::class, 'edit'])->name('forecasts.edit');

//Route::get('/forecasts/{forecast}', [ForecastController::class, 'show'])->name('forecasts.show');
Route::get('/forecasts/{forecast}/generateXML', [ForecastController::class, 'generateXML'])->name('forecasts.generateXML');

Route::get('/forecasts/{forecast}/generateAPI', [ForecastController::class, 'generateAPI'])->name('forecasts.generateAPI');

//Route::get('/send-xml', [XmlController::class, 'sendXml']);

Route::post('/send-xml', [XmlController::class, 'sendXml']);

Route::middleware('auth:api')->post('/send-xml', [XmlController::class, 'sendXml']);


// In routes/web.php or routes/api.php
Route::get('/push-feed-xml', [ApiController::class, 'sendCurlRequest']);

Route::get('/generate-xml', [ForecastController::class, 'generateXml']);












