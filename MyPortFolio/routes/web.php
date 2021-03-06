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
    $user = auth()->user();
    return view('welcome')->with('user', $user);
});

Route::get('guest', 'Auth\LoginController@guest'); //ゲストログイン

Auth::routes([
    'reset' => false
]);

//ショップ一覧に戻る際のルーティング

//ログインしている時のみルーティング
Route::group(['middleware' => 'auth'], function () {

    //ユーザーのログアウト処理
    Route::post('/', 'Auth\LoginController@logout');

    Route::get('/shops', 'ShopController@index');

    //投稿機能(作成,作成処理,編集,更新,削除)
    Route::resource('shops', 'ShopController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

    Route::get('shops/favorite/{shopId}', 'FavoriteController@favorite')->name('shops.favorite');
    Route::get('shops/unfavorite/{shopId}', 'FavoriteController@unfavorite')->name('shops.unfavorite');

    Route::resource('mypage','HomeController',['only' => ['show','edit','update']]);
});
