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
})->name('home');

Route::get('aboutus', function (){
    return view('ems.aboutus');
})->name('aboutus');

Auth::routes();

Route::resource('events', 'EventsController');
Route::get('categories/{category}', 'EventsController@show_category')->name('category');
