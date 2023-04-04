<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShopController;


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
//最初の画面表示
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/aタグのhrefの名前を書き込む', function () {
//     return view('○○○.blade.php の〇〇を書き込む');
// });
//ルーティングはコントローラーも呼び出してページ遷移することができる。

Auth::routes();

//ログイン後の画面（home）
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//店舗登録
Route::get('add_shop', function () {
    return view('add_shop');
});
//店舗登録ボタン（処理後はhomeへ）
Route::post('/add_shop', [App\Http\Controllers\ShopController::class, 'create']);

//店舗編集
Route::get('edit_shop', function () {
    return view('edit_shop');
});

//店舗一覧
// Route::get('list_shop', function () {
//     return view('list_shop');
// });
Route::resource('list_shop','App\Http\Controllers\shopController');



