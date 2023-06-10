<?php

use App\Http\Controllers\{ProfileController, FuncionarioController};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FuncionarioController::class, 'index'] )->middleware(['auth', 'verified'])->name('funcionario.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/funcionarios/cadastro', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionario.show');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::put('/funcionarios', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('funcionarios', [FuncionarioController::class, 'destroy'])->name('funcionario.destroy');
});

require __DIR__.'/auth.php';
