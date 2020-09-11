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

Route::post('/', 'Auth\LoginController@logout'); //ユーザーのログアウト処理

Route::get('guest', 'Auth\LoginController@guest'); //ゲストログイン

Auth::routes([
    'reset' => false
]);

Route::get('/home', 'HomeController@index'); //ゲストログイン時のホームに戻る際のルーティング
Route::post('/home', 'HomeController@index')->name('home');


