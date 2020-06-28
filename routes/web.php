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

// User pages

Route::get('/settings', function () {
    return view('users.page-settings');
});

Route::get('/groups', function () {
    return view('users.page-groups');
});

Route::get('/friends', function () {
    return view('users.page-user-lists');
});

Route::get('/my-profile', function () {
    return view('users.page-user-profile');
});

Route::get('/edit-profile', function () {
    return view('users.page-edit-profile');
});

Route::get('/dashboard', 'HomeController@index')->name('home');

// ------------------------------ //

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
