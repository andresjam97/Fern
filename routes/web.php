<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Clientes\ClientesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('clientes')->middleware(['auth'])->group(function () {
    Route::get('index', [ClientesController::class, 'index'])->name('form-clientes');
    Route::post('sendCliente', [ClientesController::class, 'sendCliente'])->name('send-cliente');

    Route::get('table', [ClientesController::class, 'table'])->name('table-clientes');

    Route::get('editClient/{id}', [ClientesController::class, 'editClient'])->name('client-edit-vw');

    Route::post('editClientReq', [ClientesController::class, 'editClientReq'])->name('client-edit-form');
});


require __DIR__.'/auth.php';
