<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RhController;
use App\Http\Controllers\GestorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Home";
})->name('home');

//rotas do rh:
Route::get('/solicitacoes', [RhController::class, 'index'])
    ->middleware('auth:rh')
    ->name('solicitacoes');

//rotas do gestor:
Route::get('/solicitacao', [GestorController::class, 'index'])
    ->middleware('auth:gestor')
    ->name('solicitacao');
Route::post('/solicitacao/store', [GestorController::class, 'store'])
    ->middleware('auth:gestor')
    ->name('gerar-solicitacao');
Route::post('/solicitacao/delete/{id}', [GestorController::class, 'delete'])
    ->middleware('auth:gestor')
    ->name('excluir-solicitacao');
Route::get('/solicitacao/edit', [GestorController::class, 'show'])
    ->middleware('auth:gestor')
    ->name('editar-solicitacao');
Route::put('/solicitacao/edit/{id}', [GestorController::class, 'edit'])
    ->middleware('auth:gestor')
    ->name('editar-solicitacao');

//rotas de autenticação: 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

require __DIR__ . '/settings.php';
// require __DIR__.'/auth.php';
