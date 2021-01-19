<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BeverageController;

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

//Route::get('/', 'PageController@getHomepage');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Top level pages

Route::group(['prefix' => ''], function () {

    Route::get('/{slug?}',
      [PageController::class, 'getPage']
    )->name('getPage');

});

// Blog posts

Route::group(['prefix' => 'blog'], function () {

    Route::get('/{slug?}',
      [BlogController::class, 'getPost']
    )->name('getPost');

});

// Beverage entries

Route::group(['prefix' => 'beverages'], function () {

    Route::get('/{slug?}',
      [BeverageController::class, 'getEntry']
    )->name('getEntry');

});




// Other pages

Route::get('/myaccount', function () {
    return view('home');
});

// User pages

Route::get('/settings', function () {
    return view('users.page-settings');
});

Route::get('/groups', function () {
    return view('users.page-groups');
});

Route::get('/groups/add-new', function () {
    return view('users.page-groups-add');
});

Route::get('/friends', function () {
    return view('users.page-user-lists');
});

Route::get('/lists', function () {
    return view('users.page-lists');
});

Route::get('users/{id}', function ($id) {
    return view('users.page-user-profile');
});

Route::get('/edit-profile', function () {
    return view('users.page-edit-profile');
});

Route::get('/settings-process', function () {
	return view('users.process-settings');
});

Route::get('/process-profile-edit', function () {
	return view('users.process-profile-edit');
});

Route::get('/add-group-process', function() {
	return view('users.process-add-group');
});

Route::get('/dashboard', 'HomeController@index')->name('home');

// ------------------------------ //

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
