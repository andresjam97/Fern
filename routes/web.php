<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Clientes\ClientesController;
use App\Http\Controllers\Pedidos\PedidosController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
})->name('inicio');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionsController::class);
});



Route::prefix('clientes')->middleware(['auth'])->group(function () {
    Route::get('index', [ClientesController::class, 'index'])->name('form-clientes');
    Route::post('sendCliente', [ClientesController::class, 'sendCliente'])->name('send-cliente');

    Route::get('table', [ClientesController::class, 'table'])->name('table-clientes');

    Route::get('editClient/{id}', [ClientesController::class, 'editClient'])->name('client-edit-vw');

    Route::post('editClientReq', [ClientesController::class, 'editClientReq'])->name('client-edit-form');
});

Route::prefix('pedidos')->middleware(['auth'])->group(function () {
    Route::get('index', [PedidosController::class, 'index'])->name('pedidos.list');
    Route::get('create', [PedidosController::class, 'create'])->name('pedidos.create');
    Route::get('store/{id}', [PedidosController::class, 'createPedido'])->name('pedidos.store');
    Route::post('storeProduct/{id}', [PedidosController::class, 'createProduct'])->name('pedidos.store.product');

    Route::get('detail/{id}', [PedidosController::class, 'detail'])->name('pedidos.create.products');

    Route::get('aditions/{id}', [PedidosController::class, 'aditions'])->name('pedidos.aditions');

    Route::post('aditions/{id}/store', [PedidosController::class, 'aditionsStore'])->name('pedidos.aditions.store');

    Route::get('show/{id}', [PedidosController::class, 'show'])->name('pedidos.edit');
    Route::get('destroy/{id}', [PedidosController::class, 'delete'])->name('pedidos.destroy');
});

