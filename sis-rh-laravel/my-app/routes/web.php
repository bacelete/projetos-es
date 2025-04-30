<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RhController;
use App\Http\Controllers\GestorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Home";
})->name('home');

//rotas do rh:
Route::get('/solicitacoes', [RhController::class, 'index'])->middleware('auth:rh');

//rotas do gestor:
Route::get('/solicitacao', [GestorController::class, 'index'])->middleware('auth:gestor');
Route::post('/solicitacao/store', [GestorController::class, 'store'])->middleware('auth:gestor');


//rota de autenticação: 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

require __DIR__ . '/settings.php';
// require __DIR__.'/auth.php';
