<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');


Route::namespace('App\Http\Controllers')->group(function() {
    Route::resource('/berita', 'BeritaController');
    Route::view('/profil', 'page.profil')->name('profil');
    Route::view('/visi-misi-tujuan', 'page.visi-misi-tujuan')->name('visi-misi-tujuan');
    Route::view('/sambutan', 'page.sambutan')->name('sambutan');
    Route::view('/sejarah', 'page.sejarah')->name('sejarah');
});

Route::namespace('App\Http\Controllers\Dashboard')->prefix('dashboard')->name('dashboard.')->group(function() {
    Route::resource('/berita', 'BeritaController');
    Route::resource('/user', 'UserController');
});
