<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\GestorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

//rota de exibir as solicitacoes
Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])
->name('solicitacoes')
->middleware('auth:rh,gestor'); 

//rotas do gestor:
Route::get('/solicitacao', [GestorController::class, 'index'])
    ->middleware('auth:gestor')
    ->name('solicitacao-view');
Route::post('/solicitacao/store', [GestorController::class, 'store'])
    ->middleware('auth:gestor')
    ->name('enviar-solicitacao');
Route::get('/solicitacao/edit/{id}', [GestorController::class, 'edit'])
    ->middleware('auth:gestor')
    ->name('view-editar');
Route::post('/solicitacao/edit/{id}/save', [GestorController::class, 'update'])
    ->middleware('auth:gestor')
    ->name('editar');
Route::get('/solicitacao/{id}', [GestorController::class], 'view')
    ->middleware('auth:gestor')
    ->name('visualizar');

//rotas de autenticação: 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

require __DIR__ . '/settings.php';
// require __DIR__.'/auth.php';
