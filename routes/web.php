<?php

use App\Category;
use Illuminate\Support\Facades\Route;

use App\Event;

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
    return view('ems.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('events', 'EventsController');
Route::resource('categories', 'CategoriesController');
Route::get('aboutus', 'CategoriesController@aboutus')->name('aboutus');