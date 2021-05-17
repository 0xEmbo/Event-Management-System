<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('events/{event}/register', 'EventsController@register')->name('events.register');
Route::post('events/{event}/join', 'EventsController@join')->name('events.join');
Route::get('{user}/myevents', 'EventsController@myevents')->name('myevents');
Route::get('user/{user}', 'EventsController@profile')->name('profile');
Route::post('user/{user}/update', 'EventsController@profile_update')->name('profile.update');
