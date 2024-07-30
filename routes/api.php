<?php

use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\PadronCatastralController;
use App\Http\Controllers\TramitantesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::prefix('padron')->group(function () {
  Route::get('/', [PadronCatastralController::class, 'index']);
  Route::get('/{id}', [PadronCatastralController::class, 'show']);

  // Route::post('/create', [ProcessListController::class, 'create']);
  // Route::post('/create', [InformacionPredioController::class, 'createOrUpdate']);
});

Route::post('/findByClaveOrNameInOwners', [PadronCatastralController::class, 'findByClaveOrNameInOwners']);

Route::post('/upload', [ArchivosController::class, 'upload']);
Route::post('/documents/store', [ArchivosController::class, 'store']);
Route::get('/documents/{clave_catastral}', [ArchivosController::class, 'getDocumentsByClave']);


Route::prefix('archivos')->group(function () {
  Route::post('/upload', [ArchivosController::class, 'upload']);
  Route::post('/documents/store', [ArchivosController::class, 'store']);
  Route::get('/documents/{clave_catastral}', [ArchivosController::class, 'getDocumentsByClave']);
});

Route::prefix('tramitante')->group(function () {
  Route::post('/store', [TramitantesController::class, 'store']);
});
