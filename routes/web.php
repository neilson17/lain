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



// Route::get('/login', function() {
//     return view('login/index');
// }); 

// Route::get('/setting', function() {
//     return view('setting/index');
// });



Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@index');
    Route::resource('notes', 'NoteController');
    Route::resource('teams', 'AccountController');
    Route::resource('todos', 'TodoController');
    Route::resource('events', 'EventController');
    Route::resource('clients', 'ClientController');
    Route::resource('finances', 'FinanceController');
    Route::resource('targets', 'TargetController');
    Route::resource('transactions', 'TransactionController');
    Route::resource('targets', 'TargetController');
    Route::resource('dashboard', 'DashboardController');
    Route::get('setting', 'AccountController@showSetting');
    Route::put('settingupdate', 'AccountController@updateProfile');
    Route::post('api/login', 'AccountController@login');
    Route::get('api/logout', 'AccountController@logout');
    Route::post('teams/deleteaccount', 'AccountController@destroy');
    Route::get('api/shownote', 'NoteController@showNote');
    Route::get('api/showaccount', 'AccountController@showAccount');
    Route::get('teams/{id}/edit', 'AccountController@edit');
    Route::get('api/showtodo', 'TodoController@showTodo');
    Route::get('api/showclient', 'ClientController@showClient');
    Route::post('api/createtodotag', 'TagController@store');
    Route::post('api/createtodo', 'TodoController@store');
    Route::post('api/createtransaction', 'TransactionController@store');
    Route::post('api/createtarget', 'TargetController@store');
    Route::post('api/edittodo', 'TodoController@update');
    Route::post('api/createevent', 'EventController@store');
    Route::post('api/editevent', 'EventController@update');
    Route::post('api/edittransaction', 'TransactionController@update');
    Route::post('api/edittarget', 'TargetController@update');
    Route::post('api/addclient', 'ClientController@store');
    Route::post('api/createnote', 'NoteController@store');
    Route::post('api/editnote', 'NoteController@update');
    Route::post('api/donetodo', 'TodoController@changeDone');
    Route::post('api/donepiutang', 'TransactionController@changeDonePiutang');
    Route::post('api/donehutang', 'TransactionController@changeDoneHutang');
    Route::post('api/donetarget', 'TargetController@changeDone');
    Route::post('api/rangeevent', 'ClientController@rangeEvent');
    Route::post('api/rangetodo', 'ClientController@rangeTodo');
    Route::post('api/rangetransaction', 'ClientController@rangeTransaction');

    // Search
    Route::post('api/searchtodos', 'TodoController@searchTodo');
    Route::post('api/searchnotes', 'NoteController@searchNote');
    Route::post('api/searchevents', 'EventController@searchEvent');
    Route::post('api/searchteams', 'AccountController@searchTeam');
    Route::post('api/searchclients', 'ClientController@searchClient');

    Route::get('reports', 'TransactionController@financeReport');
    Route::post('transactions/getReportsContent', 'TransactionController@getReportsContent');
    
});

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
