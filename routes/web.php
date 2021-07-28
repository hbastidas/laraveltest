<?php

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

Route::get('/', 'PruebaController@welcome');
//a view to test form
Route::get('/laraveltest', 'PruebaController@laraveltest');
//a laravel welcome initial app
Route::get('/welcome', 'PruebaController@welcome');
