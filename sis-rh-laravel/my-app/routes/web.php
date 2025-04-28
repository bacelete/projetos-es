<?php

use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

//rotas da solicitação
Route::get('/solicitacoes', [SolicitacaoController::class, 'index']);
Route::get('/solicitacao', [SolicitacaoController::class, 'create']); 
Route::post('/solicitacao/store', [SolicitacaoController::class, 'store']); 

//rotas do servidor: 

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
