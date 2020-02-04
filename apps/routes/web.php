<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/top', ['as' => 'pet.top', 'uses' => 'PetController@index']);
Route::post('/top', ['as' => 'pet.search', 'uses' => 'PetController@search']);
