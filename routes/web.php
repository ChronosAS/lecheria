<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', \App\Http\Livewire\Welcome::class)->name('home');
Route::prefix('registro-civil')->group(function(){
    Route::get('/', \App\Http\Livewire\CivilRegistry\Index::class)->name('civil-registry');
});

Route::middleware('auth')
    ->prefix('admin')
    ->group(function(){

    });
