<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class , 'login'])->name('login');
Route::post('/entrar', [AuthController::class , 'entrar'])->name('entrar');
Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/cadastro', [AuthController::class , 'cadastro'])->name('cadastro');

Route::middleware('auth:sanctum')->group(function(){
Route::get('/tarefas', [TarefaController::class , 'index'])->name('tarefas');
Route::post('/criar-tarefas', [TarefaController::class , 'store'])->name('criar-tarefas');
});

//e81a9df6fbef5b2bccb7304aa04021b2-7ca144d2-90b1d395