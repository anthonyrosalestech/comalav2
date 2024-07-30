<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\PermissionController;
use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\GeneralesController;
use App\Http\Controllers\PadronCatastralController;
use App\Http\Controllers\TipoTramitesController;
use App\Models\PadronCatastral;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     // return Inertia::render('Dashboard');
// })->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::get('/', [TipoTramitesController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'role: super-admin|admin|moderator|developer'])->group(function() {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'update']);
    Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    Route::resource('permissions', PermissionController::class)->except(['create', 'show', 'edit']);
    Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);

    // Route::get('/servicios', [GeneralesController::class, 'servicios']);
    // Route::get('/servicios/{id}', [GeneralesController::class, 'actualizarServicio']);
});


Route::prefix('test')->middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::get('/nuevo-tramite', [PadronCatastralController::class, 'nuevoTramite'])->name('nuevo_tramite');
  Route::get('/nuevo-tramite/{id}', [PadronCatastralController::class, 'nuevoTramitePorId']);
});


Route::get('files/{name}/{filename}', function (string $name, string $filename) {
  $listDocuments = ["titulo_propiedad", "ine", "impuesto_predial", "croquis", "fomato_solicitud_direccion", "formato_cna", "formato_recibo_pago"];
  $urlBase = "app/public/" . $filename;

  foreach ($listDocuments as &$valor) {
    if($valor === $name) {
      $url = $urlBase . "/" . $valor . "/" . $valor . ".pdf";
      if(file_exists(storage_path($url))) {
        // dd(storage_path($url));
        return response()->file(storage_path($url));
      }
    }
  }
  return response()->json();

})->name('files');
