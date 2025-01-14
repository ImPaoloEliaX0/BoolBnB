<?php

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

Route::middleware('auth')
    ->namespace('User')
    ->name('user.')
    ->prefix('user')
    ->group(function() {
        // utente registrato
        Route::get('/', 'HomeController@index')
        ->name('home');

       Route::resource('apartments', 'ApartmentController');
       // Route::resource('/categories', 'CategoryController');
       // Route::resource('/tags', 'TagController');
    });


Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*');
