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



Auth::routes();

Route::resource('event', 'EventsController', ['only' => ['create', 'store', 'show', 'destroy']]);
Route::get('/', 'EventsController@index')->name('home');
Route::get('aboutus', 'EventsController@aboutus')->name('aboutus');
Route::get('category/{category}', 'EventsController@show_category')->name('category');
Route::get('event/{event}/register', 'EventsController@register')->name('event.register');
Route::post('event/{event}/join', 'EventsController@join')->name('event.join');
Route::get('user/{user}/myevents', 'EventsController@myevents')->name('myevents');
Route::get('user/{user}', 'EventsController@profile')->name('profile');
Route::post('user/{user}/update', 'EventsController@profile_update')->name('profile.update');
Route::delete('event/{event}/delete_applicant', 'EventsController@delete_applicant')->name('applicant.delete');
Route::put('event/{event}/rate_room', 'EventsController@rate_room')->name('room.rate');
