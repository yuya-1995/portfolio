<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ChatGptController;
use GuzzleHttp\Client;


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
//店舗登録ボタン（処理後はlist_shopへ）
// Route::post('/add_shop', [App\Http\Controllers\ShopController::class, 'create']); //【店舗登録】クリック時
Route::post('/add_shop', [App\Http\Controllers\ShopController::class, 'val_create'])->name('add_shop'); //バリデーション付き


//店舗編集
// Route::get('/edit_shop/{shop_id}', [App\Http\Controllers\ShopController::class, 'edit_index'])->name('edit_shop'); //【店舗編集】クリック時
Route::get('/edit_shop/{shop_id}', [App\Http\Controllers\ShopController::class, 'edit_index'])->name('edit_shop'); //バリデーション付き


//編集実行
// Route::post('/edit/{shop_id}', [App\Http\Controllers\ShopController::class, 'edit_list'])->name('edit'); //【編集完了】クリック時
Route::post('/edit/{shop_id}', [App\Http\Controllers\ShopController::class, 'val_edit_list'])->name('edit'); //バリデーション付き

//店舗削除
Route::get('/delete/{shop_id}', [App\Http\Controllers\ShopController::class, 'delete_list'])->name('delete'); //【削除】クリック時

//在庫一覧
Route::get('/list_item/{shop_id}', [App\Http\Controllers\ShopController::class, 'item_shop_index'])->name('list_item'); //【在庫】クリック時


//商品登録
Route::get('/add_item/{shop_id}', [App\Http\Controllers\ShopController::class, 'add_item_index'])->name('add_item'); //　【商品登録】クリック時

//商品登録ボタン（処理後はlist_itemへ）
// Route::post('/add_item', [App\Http\Controllers\ItemController::class, 'create']); //【登録】クリック時
Route::post('/add_item', [App\Http\Controllers\ItemController::class, 'val_create']); //バリデーション付き

//商品削除ボタン（処理後はlist_itemへ）
Route::get('/delete_item/{item_id}', [App\Http\Controllers\ItemController::class, 'delete_item'])->name('delete_item'); //【削除】クリック時

//商品編集（値を渡す）
Route::get('/edit_item/{item_id}', [App\Http\Controllers\ItemController::class, 'edit_item_index'])->name('edit_item'); //【編集】クリック時

//編集実行
// Route::post('/edit_/{item_id}', [App\Http\Controllers\ItemController::class, 'edit_item'])->name('edit_'); //【編集完了】クリック時
Route::post('/edit_/{item_id}', [App\Http\Controllers\ItemController::class, 'val_edit_item'])->name('edit_'); //バリデーション付き

//在庫移動
Route::get('/move_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move_item'])->name('move_item');

//移動実行（処理後はlist_itemへ）
Route::post('/move/{item_id}', [App\Http\Controllers\ItemController::class, 'move'])->name('move');

//スタイリッシュ案
Route::get('/move1_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move1_item'])->name('move1_item');
Route::get('/move2_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move2_item'])->name('move2_item');
Route::get('/move3_item/{item_id}', [App\Http\Controllers\ItemController::class, 'move3_item'])->name('move3_item');

//memo関連
Route::post('/post', [App\Http\Controllers\PostController::class, 'post'])->name('post'); //非同期処理
// Route::get('/memo_result/ajax', [App\Http\Controllers\PostController::class, 'getData']);

Route::post('/post', [App\Http\Controllers\PostController::class, 'post']);
Route::get('/delete_memo/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete_memo');

//ルーム作成画面へ
Route::get('add_room', function () {
    return view('add_room');
});
//ルーム作成(処理後はlist_roomへ)
// Route::post('/add_room', [App\Http\Controllers\RoomController::class, 'create']); //【作成】クリック時
Route::post('/add_room', [App\Http\Controllers\RoomController::class, 'val_create']); //バリデーション付き

//ルーム一覧
Route::get('/list_room',[App\Http\Controllers\RoomController::class, 'index'])->name('list_room');//【ルーム一覧】クリック時

//ルーム参加
Route::get('/room/{id}', [App\Http\Controllers\ChatController::class, 'chat_index'])->name('room'); //【参加】クリック時

//チャット送信（処理後はroomへ）
Route::post('/chat_post/{id}', [App\Http\Controllers\ChatController::class, 'chat_post'])->name('chat_post'); //【参加】クリック時

//ルーム削除（処理後はroomへ）
Route::get('/delete_room/{id}', [App\Http\Controllers\RoomController::class, 'delete_room'])->name('delete_room'); //【削除】クリック時

// ルーム編集画面へ
Route::get('/edit_room/{id}', [App\Http\Controllers\RoomController::class, 'edit_room_index'])->name('edit_room'); //【削除】クリック時

//ルーム編集実行
// Route::post('/edit__/{id}', [App\Http\Controllers\RoomController::class, 'edit_room'])->name('edit__'); //【編集完了】クリック時
Route::post('/edit__/{id}', [App\Http\Controllers\RoomController::class, 'val_edit_room'])->name('edit__'); //【編集完了】クリック時

//スキル登録
Route::get('add_skill', function () {
    return view('add_skill');
});
//スキル登録(処理後はlist_skillへ)
Route::post('/add_skill', [App\Http\Controllers\SkillController::class, 'val_create']); //バリデーション付き

//従業員一覧
// Route::get('/list_worker',[App\Http\Controllers\SkillController::class, 'index_user'])->name('list_worker');//【社員一覧】クリック時
Route::get('/list_worker',[App\Http\Controllers\TaskController::class, 'index_user'])->name('list_worker');//【社員一覧】クリック時

//スキル付与
Route::get('/give_skill/{user_id}/{skill_id}',[App\Http\Controllers\SkillController::class, 'give_skill'])->name('give_skill');//

//スキル削除
Route::get('/delete_skill/{user_id}/{skill_id}',[App\Http\Controllers\SkillController::class, 'delete_skill'])->name('delete_skill');//

//役職登録
Route::get('/add_position', [App\Http\Controllers\PositionController::class, 'index'])->name('add_position'); //　【商品登録】クリック時

//役職登録処理後は社員一覧へ
Route::post('/do_add_position', [App\Http\Controllers\PositionController::class, 'add'])->name('do_add_position'); //　【商品登録】クリック時

//同期通信チャット
Route::post('/add', [App\Http\Controllers\HomeController::class, 'add'])->name('add');

//非同期通信チャット
Route::get('/result/ajax', [App\Http\Controllers\HomeController::class, 'getData']);

//chat_gpt_room
Route::get('/ChatGptSearch', [App\Http\Controllers\ChatGptSearchController::class, 'index']);
Route::post('/ChatGptSearch_post', [App\Http\Controllers\ChatGptSearchController::class, 'chat']);

