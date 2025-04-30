<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RhController;
use App\Http\Controllers\GestorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Home";
})->name('home');

//rotas da solicitação
Route::middleware(('auth:rh'), function () {
    Route::get('/solicitacoes', [RhController::class, 'index']);
});
Route::middleware(('auth:gestor'), function () {
    Route::get('/solicitacao', [GestorController::class, 'index']);
    Route::post('/solicitacao/store', [GestorController::class, 'store']);
});

//rota de autenticação: 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

require __DIR__ . '/settings.php';
// require __DIR__.'/auth.php';
