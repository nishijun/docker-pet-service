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
Route::get('/top', ['as' => 'top', 'uses' => 'HomeController@top']);
Route::post('/top', ['as' => 'top.search', 'uses' => 'HomeController@search']);
Route::get('/top/{id}', ['as' => 'top.detail', 'uses' => 'HomeController@detail']);

Route::group(['middleware' => 'auth'], function() {
  Route::get('/mypage', ['as' => 'mypage', 'uses' => 'MypageController@index']);
  Route::get('/mypage/unsubscribe', ['as' => 'mypage.unsubscribe', 'uses' => 'MypageController@unsubscribe']);
  Route::post('/mypage/unsubscribe', ['as' => 'mypage.withdraw', 'uses' => 'MypageController@withdraw']);
  Route::get('/mypage/editProfile', ['as' => 'mypage.editProfile', 'uses' => 'MypageController@editProfile']);
  Route::post('/mypage/editProfile', ['as' => 'mypage.updateUser', 'uses' => 'MypageController@updateUser']);
  Route::get('/mypage/changePassword', ['as' => 'mypage.changePassword', 'uses' => 'MypageController@changePassword']);
  Route::post('/mypage/changePassword', ['as' => 'mypage.updatePassword', 'uses' => 'MypageController@updatePassword']);
  Route::get('/mypage/registerPet', ['as' => 'mypage.registerPet', 'uses' => 'MypageController@registerPet']);
  Route::post('/mypage/registerPet', ['as' => 'mypage.createPet', 'uses' => 'MypageController@createPet']);
  Route::post('/top/{id}', ['as' => 'board1', 'uses' => 'HomeController@board1']);
  Route::get('/top/{id}/{bId}', ['as' => 'board2', 'uses' => 'HomeController@board2']);
  Route::post('/top/{id}/{bId}', ['as' => 'message', 'uses' => 'HomeController@message']);
  // Route::post('/top/{id}/favorite', ['as' => 'favorite', 'uses' => 'HomeController@favorite']);
});
