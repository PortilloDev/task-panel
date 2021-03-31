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

//controla la parte publica
Route::get('/', 'PageController@tasks');
Route::get('tasks/{task}', 'PageController@task')->name('task');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('tasks', 'Backend\TaskController')->middleware('auth')->except('show');
/*Route::get('/tasks/index', 'Backend\TaskController@index')->name('index');
Route::get('/tasks/create', 'Backend\TaskController@create')->name('create');
Route::post('/tasks/show', 'Backend\TaskController@show')->name('show');
Route::get('/tasks/edit/{id}', 'Backend\TaskController@edit')->name('edit');*/
Route::get('task', 'Backend\TaskController@index')->name('index');
Route::get('task/create', 'Backend\TaskController@crearTask')->name('crearTask');
Route::post('tasks', 'Backend\TaskController@store')->name('store');
Route::get('task/{id}/edit', 'Backend\TaskController@edit')->name('edit');
Route::put('task/{id}', 'Backend\TaskController@update')->name('update');
Route::delete('task/{id}', 'Backend\TaskController@destroy')->name('destroy');
