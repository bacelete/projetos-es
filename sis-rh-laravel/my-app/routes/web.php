<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\GestorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Home";
})->name('home');

//rota de exibir as solicitacoes
Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])
->name('solicitacoes')
->middleware('auth:rh,gestor'); 

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
Route::get('/solicitacao/edit', [GestorController::class, 'index_edit'])
    ->middleware('auth:gestor')
    ->name('editar-solicitacao');

//rotas de autenticação: 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

require __DIR__ . '/settings.php';
// require __DIR__.'/auth.php';
