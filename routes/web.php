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
    return view('welcome');
});

Auth::routes();
// ->name() la ten cua route de code de hon
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@adminHome')->name('admin')->middleware('is_admin');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController')->middleware('is_admin');;
    Route::resource('products','ProductController');
});
