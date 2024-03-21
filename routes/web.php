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

Route::get('/', \App\Http\Livewire\AppHome::class)->name('home');
Route::prefix('registro-civil')->group(function(){
    Route::get('/', \App\Http\Livewire\CivilRegistry\Index::class)->name('civil-registry');
});

Route::prefix('noticias')->group(function(){

    Route::get('/',
    \App\Http\Livewire\News\Index::class)->name('news.index');

    Route::get('show/{post}/{slug}', \App\Http\Livewire\News\Show::class)->name('news.show');
});

Route::group(['middleware' => ['role:admin','auth']], function(){

    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', \App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');

        Route::prefix('noticias')->group(function(){
            Route::get('/todas',App\Http\Livewire\Admin\News\Index::class)->name('admin.news.index');

            Route::get('/create', App\Http\Livewire\Admin\News\Create::class)->name('admin.news.create');

            Route::get('/{post}/edit', App\Http\Livewire\Admin\News\Edit\EditComponent::class)->name('admin.news.edit');

            Route::get('/{post}/show', App\Http\Livewire\Admin\News\Show::class)->name('admin.news.show');

            Route::get('/{post}/delete', App\Http\Livewire\Admin\News\Delete::class)->name('admin.news.delete');
        });
    });
});
