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
Route::resource('todos', 'ToDoController');
Route::resource('date', 'DateController');

Route::get('/note/detail', function() {
    return view('note/detail');
});

// Route::get('/date', function() {
//     return view('date/index');
// });

// Route::get('/date/detail', function() {
//     return view('date/detail');
// });

// Route::get('/date/create', function() {
//     return view('date/add');
// });

// Route::get('/date/edit', function() {
//     return view('date/edit');
// });

Route::get('/login', function() {
    return view('login/index');
}); 

// Route::get('api/login', "AccountController@test");

// Route::get('api/login/{username}/{password}', "AccountController@test");

// Route::post('api/test', 'AccountController@test')->name('account.test');
Route::post('api/login', 'AccountController@testpost')->name('api.login');

Route::get('api/shownote', 'NoteController@showNote');

Route::get('api/showaccount', 'AccountController@showAccount');