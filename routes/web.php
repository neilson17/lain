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

Route::get('/login', function() {
    return view('login/index');
}); 

Route::get('/setting', function() {
    return view('setting/index');
});

// Route::get('/dashboard', function() {
//     return view('dashboard/index');
// });

// Route::get('/client', function() {
//     return view('client/index');
// });

// Route::get('/client/detail', function() {
//     return view('client/detail');
// });

// Route::get('/client/create', function() {
//     return view('client/add');
// });

// Route::get('/client/edit', function() {
//     return view('client/edit');
// });

Route::get('setting', 'AccountController@showSetting');
Route::put('settingupdate', 'AccountController@updateProfile');

Route::resource('notes', 'NoteController');
Route::resource('teams', 'AccountController');
Route::resource('todos', 'TodoController');
Route::resource('events', 'EventController');
Route::resource('clients', 'ClientController');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('dashboard', 'DashboardController');
});

//jgn dihapus yg bawah
// Route::get('api/login', "AccountController@test");
// Route::get('api/login/{username}/{password}', "AccountController@test");
// Route::post('api/test', 'AccountController@test')->name('account.test');
Route::post('api/login', 'AccountController@login');
Route::get('api/logout', 'AccountController@logout');
Route::post('teams/deleteaccount', 'AccountController@destroy');
Route::get('api/shownote', 'NoteController@showNote');
Route::get('api/showaccount', 'AccountController@showAccount');
Route::get('teams/{username}/edit', 'AccountController@edit');
// Route::post('teams/{username}', 'AccountController@update');
Route::get('api/showtodo', 'TodoController@showTodo');
Route::get('api/showclient', 'ClientController@showClient');
Route::post('api/createtodotag', 'TagController@store');
Route::post('api/createtodo', 'TodoController@store');
Route::post('api/edittodo', 'TodoController@update');
Route::post('api/createevent', 'EventController@store');
Route::post('api/editevent', 'EventController@update');
Route::post('api/addclient', 'ClientController@store');
Route::post('api/createnote', 'NoteController@store');
Route::post('api/editnote', 'NoteController@update');
Route::post('api/donetodo', 'TodoController@changeDone');
Route::post('api/rangeevent', 'ClientController@rangeEvent');
Route::post('api/rangetodo', 'ClientController@rangeTodo');

// Search
Route::post('api/searchtodos', 'TodoController@searchTodo');
Route::post('api/searchnotes', 'NoteController@searchNote');
Route::post('api/searchevents', 'EventController@searchEvent');
Route::post('api/searchteams', 'AccountController@searchTeam');
Route::post('api/searchclients', 'ClientController@searchClient');