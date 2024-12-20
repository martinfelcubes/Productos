<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/',[ProductoController::class,'index'])->name('indexproducto');
Route::get('/create',[ProductoController::class,'create'])->name('crearproducto');
Route::post('/store',[ProductoController::class,'store'])->name('guardarproducto');
Route::get('/show',[ProductoController::class,'show'])->name('mostrarproducto');
Route::get('/edit/{id}',[ProductoController::class,'edit'])->name('editarproducto');
Route::put('/update/{id}',[ProductoController::class,'update'])->name('actualizarproducto');
Route::delete('/destroy/{id}',[ProductoController::class,'destroy'])->name('eliminarproducto');