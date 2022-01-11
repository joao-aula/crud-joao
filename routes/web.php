<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\FuncionarioController::class,'index'])->name('site.index');
Route::post('/',[\App\Http\Controllers\FuncionarioController::class,'store'])->name('registrar.func');
Route::post('/',[\App\Http\Controllers\FuncionarioController::class,'update'])->name('atualizar.func');



Route::resource('funcionarios', 'FuncionarioController');

