<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    echo "Home"; 
})->name('home');

//rotas da solicitação
Route::get('/solicitacoes', [SolicitacaoController::class, 'index']);
Route::get('/solicitacao', [SolicitacaoController::class, 'create']); 
Route::post('/solicitacao/store', [SolicitacaoController::class, 'store']); 

//rota de autenticação: 
Route::get('/login', [LoginController::class, 'show']); 
Route::post('/login', [LoginController::class, 'login'])->name('login'); 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');
});

require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';
