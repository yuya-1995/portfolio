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

//{{route('delete')}}は→name('○○○')

Auth::routes();

//ログイン後の画面（home）
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//店舗一覧
Route::get('/list_shop',[App\Http\Controllers\ShopController::class, 'index'])->name('list_shop');//【店舗一覧】クリック時

//店舗登録
Route::get('add_shop', function () {
    return view('add_shop');
});
//店舗登録ボタン（処理後はhomeへ）
Route::post('/add_shop', [App\Http\Controllers\ShopController::class, 'create']); //【店舗登録】クリック時

//店舗編集
Route::get('/edit_shop/{shop_id}', [App\Http\Controllers\ShopController::class, 'edit_index'])->name('edit_shop'); //【店舗編集】クリック時
//編集実行
Route::post('/edit/{shop_id}', [App\Http\Controllers\ShopController::class, 'edit_list'])->name('edit'); //【編集完了】クリック時

//店舗削除
Route::get('/delete/{shop_id}', [App\Http\Controllers\ShopController::class, 'delete_list'])->name('delete'); //【削除】クリック時

//在庫一覧
Route::get('/list_item/{shop_id}', [App\Http\Controllers\ShopController::class, 'item_shop_index'])->name('list_item'); //【在庫】クリック時


//商品登録
// Route::get('/add_item', [App\Http\Controllers\ItemController::class, 'add_item'])->name('add_item'); //【商品登録】クリック時
Route::get('/add_item/{shop_id}', [App\Http\Controllers\ShopController::class, 'add_item_index'])->name('add_item'); //　【商品登録】クリック時

//商品登録ボタン（処理後はlist_itemへ）
Route::post('/add_item', [App\Http\Controllers\ItemController::class, 'create']); //【登録】クリック時

//商品削除ボタン（処理後はlist_itemへ）
Route::get('/delete_item/{item_id}', [App\Http\Controllers\ItemController::class, 'delete_item'])->name('delete_item'); //【削除】クリック時

//商品編集（値を渡す）
Route::get('/edit_item/{item_id}', [App\Http\Controllers\ItemController::class, 'edit_item_index'])->name('edit_item'); //【削除】クリック時

//編集実行
Route::post('/edit_/{item_id}', [App\Http\Controllers\ItemController::class, 'edit_item'])->name('edit_'); //【削除】クリック時

//在庫移動
Route::get('/move_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move_item'])->name('move_item');

//移動実行（処理後はlist_itemへ）
Route::post('/move/{item_id}', [App\Http\Controllers\ItemController::class, 'move'])->name('move');

//スタイリッシュ案
Route::get('/move1_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move1_item'])->name('move1_item');
Route::get('/move2_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move2_item'])->name('move2_item');
Route::get('/move3_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move3_item'])->name('move3_item');

//チャット関連
Route::post('/post', [App\Http\Controllers\PostController::class, 'post']);
