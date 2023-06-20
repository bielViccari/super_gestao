<?php

use App\Http\Controllers\{ProfileController, FuncionarioController};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function() {
    Route::get('/funcionarios/cadastro', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::get('/funcionarios/edit/{id}',[FuncionarioController::class, 'edit'])->name('funcionario.edit');
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionario.show');
    Route::get('/dashboard', [FuncionarioController::class, 'index'] )->name('funcionario.index');
});

require __DIR__.'/auth.php';
