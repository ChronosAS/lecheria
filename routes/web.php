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

Auth::routes(['register'=> false]);
Route::get('/', \App\Http\Livewire\Welcome::class)->name('home');
Route::prefix('registro-civil')->group(function(){
    Route::get('/', \App\Http\Livewire\CivilRegistry\Index::class)->name('civil-registry');
});

Route::group(['middleware' => ['role:admin','auth']], function(){
    // Route::get('/admin', \App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
});
