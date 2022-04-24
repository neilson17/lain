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

Route::get('/team', function() {
    return view('team/index');
});

Route::get('/team/edit', function() {
    return view('team/edit');
});

Route::get('/team/add', function() {
    return view('team/add');
});

Route::get('/client', function() {
    return view('client/index');
});

Route::get('/note', function() {
    return view('note/index');
});

Route::get('/note/add', function() {
    return view('note/add');
});

Route::get('/note/detail', function() {
    return view('note/detail');
});

Route::get('/note/edit', function() {
    return view('note/edit');
});

Route::get('/login', function() {
    return view('login/index');
}); 

// Route::get('api/login', "AccountController@test");

// Route::get('api/login/{username}/{password}', "AccountController@test");

// Route::post('api/test', 'AccountController@test')->name('account.test');
Route::post('api/login', 'AccountController@testpost')->name('api.login');

Route::get('api/shownote', 'NoteController@showNote');