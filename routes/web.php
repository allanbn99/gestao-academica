<?php

use App\Models\funcionarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('secretaria')
    ->middleware('role:TecnicoAdministrativo')
    ->group(function() {
        Route::resource('curso', App\Http\Controllers\CursoController::class);
        Route::resource('funcionario', App\Http\Controllers\FuncionarioController::class);
        Route::resource('disciplina', App\Http\Controllers\DisciplinaController::class);        
}); 
