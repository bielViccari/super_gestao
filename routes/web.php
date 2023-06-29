<?php

use App\Http\Controllers\{ProfileController, FuncionarioController, PainelController};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('pagina.inicial');

//rota para o usuario acessar seu perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//rotas que somente administradores acessam
Route::middleware(['auth','admin'])->group(function() {
    Route::get('/funcionarios/cadastro', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::get('/funcionarios/edit/{id}',[FuncionarioController::class, 'edit'])->name('funcionario.edit');
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
    Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');
    Route::get('/painel/edit/{id}', [PainelController::class, 'edit'])->name('painel.edit');
    Route::put('/painel/{id}',[PainelController::class, 'update'])->name('painel.update');
});

//rotas que usuários básicos tambem tem acesso
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionario.show');
    Route::get('/dashboard', [FuncionarioController::class, 'index'] )->name('funcionario.index');
});

require __DIR__.'/auth.php';
