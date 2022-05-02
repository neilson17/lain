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

Route::get('/profile', function() {
    return view('layout/bar');
});

Route::get('/dashboard', function() {
    return view('dashboard/index');
});

Route::get('/client', function() {
    return view('client/index');
});

Route::get('/client/detail', function() {
    return view('client/detail');
});

Route::get('/client/create', function() {
    return view('client/add');
});

Route::get('/client/edit', function() {
    return view('client/edit');
});

Route::get('/setting', function() {
    return view('setting/index');
});

Route::resource('notes', 'NoteController');
Route::resource('teams', 'AccountController');
Route::resource('todos', 'ToDoController');
Route::resource('events', 'EventController');

Route::get('/login', function() {
    return view('login/index');
}); 

// Route::get('api/login', "AccountController@test");

// Route::get('api/login/{username}/{password}', "AccountController@test");

// Route::post('api/test', 'AccountController@test')->name('account.test');
Route::post('api/login', 'AccountController@testpost')->name('api.login');

Route::get('api/shownote', 'NoteController@showNote');

Route::get('api/showaccount', 'AccountController@showAccount');