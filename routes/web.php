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

Route::resource('notes', 'NoteController');
Route::resource('teams', 'AccountController');

Route::get('/note/detail', function() {
    return view('note/detail');
});

Route::get('/todo', function() {
    return view('todo/index');
});

Route::get('/todo/detail', function() {
    return view('todo/detail');
});

Route::get('/todo/edit', function() {
    return view('todo/edit');
});

Route::get('/todo/create', function() {
    return view('todo/add');
});

Route::get('/login', function() {
    return view('login/index');
}); 

// Route::get('api/login', "AccountController@test");

// Route::get('api/login/{username}/{password}', "AccountController@test");

// Route::post('api/test', 'AccountController@test')->name('account.test');
Route::post('api/login', 'AccountController@testpost')->name('api.login');

Route::get('api/shownote', 'NoteController@showNote');

Route::get('api/showaccount', 'AccountController@showAccount');