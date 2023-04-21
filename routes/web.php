<?php

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::prefix('registro-civil')->group(function(){
    Route::get('/',function (){
        return view('civil-registry');
    })->name('civil-registry');

    Route::get('/buena-conducta-pdf',
        '\App\Http\Controllers\Documents\GeneratePdf'
    )->name('civil-registry.buena-conducta.generate-pdf');
});
