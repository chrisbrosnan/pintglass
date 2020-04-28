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

Route::get('/', function () {
    return view('index');
});

Route::get('/myaccount', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('page-about');
});

Route::get('/venues', function () {
    return view('page-venues');
});

Route::get('/search', function () {
    return view('page-search');
});

Route::get('/blog', function () {
    return view('page-blog');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
