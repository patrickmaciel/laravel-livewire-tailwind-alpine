<?php

use App\Http\Livewire\Pages\Exemplos;
use App\Http\Livewire\Pages\Todo;
use App\Http\Livewire\Pages\TodoAlpine;
use App\Http\Livewire\Pages\TodoAlpineInline;
use App\Http\Livewire\Pages\TodoModal;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemplos', Exemplos::class);
Route::get('/todo', Todo::class)->name('todo');
Route::get('/todo-modal', TodoModal::class)->name('todo-modal');
Route::get('/todo-alpine', TodoAlpine::class)->name('todo-alpine');
Route::get('/todo-alpine-inline', TodoAlpineInline::class)->name('todo-alpine-inline');
