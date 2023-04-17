<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Log::debug($request);　何が入っているか確認できる
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得
use Illuminate\Support\Facades\Validator; //バリデーション

class ShopController extends Controller
{
    // 主　→ 従
    // $area_tokyo = Area::find(1)->shops->toArray();
    // 主　← 従
    // $shop = Shop::find(2)->area->name;
    // dd($area_tokyo, $shop);

    //店舗登録
    //店舗バリデーション
    public function val_create(Request $request)
    {
        // ここにValidationを行うロジックを記述する
        // $request->validate(
        $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'shop_name' => ['required', 'min:3', 'max:15'],
                'shop_address' => ['required'],
                'at1st' => ['required'],
                'at2nd' => ['required'],
                'at3rd' => ['required'],
                'loss_alert' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect('add_shop')
                        ->withErrors($validator)
                        ->withInput();
        }
        //バリデーション通過後の処理
        shop::create([
            "shop_name" => $request->shop_name,
            "shop_address" => $request->shop_address,
            "at1st" => $request->at1st,
            "at2nd" => $request->at2nd,
            "at3rd" => $request->at3rd,
            "loss_alert" => $request->loss_alert,
            "users_id" => Auth::id(), //現在ログインしているアカウントIDの取得
        ]);

        $shop_list = shop::all();

        return view("list_shop", compact('shop_list'));
    }
    //下記、
    // public function create(Request $request)

    // {
    //     // Log::debug($request);　何が入っているか確認できる
    //     shop::create([
    //         "shop_name" => $request->shop_name,
    //         "shop_address" => $request->shop_address,
    //         "at1st" => $request->at1st,
    //         "at2nd" => $request->at2nd,
    //         "at3rd" => $request->at3rd,
    //         "loss_alert" => $request->loss_alert,
    //         "users_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    //     ]);

    //     $shop_list = shop::all();

    //     return view("list_shop", compact('shop_list'));
    // }





    //店舗一覧（DBから店舗情報を全て取得）
    public function index()
    {
        $shop_list = shop::all();
        return view("list_shop", compact('shop_list'));
    }

    //店舗編集
    public function edit_index($shop_id)
    {
        // dd($shop_id);
        $list = shop::where('shop_id', $shop_id)->first();

        return view("edit_shop", compact('list'));
        // return view("edit_shop",compact('list'));
    }

    // public function edit_list(Request $request, $shop_id)
    // {
    //     $shop_list = shop::where('shop_id', $shop_id)->first();
    //     $shop_list->update([
    //         "shop_name" => $request->shop_name,
    //         "shop_address" => $request->shop_address,
    //         "at1st" => $request->at1st,
    //         "at2nd" => $request->at2nd,
    //         "at3rd" => $request->at3rd,
    //         "loss_alert" => $request->loss_alert,

    //     ]);

    //     return redirect("list_shop");
    //     // return view("edit_shop",compact('list')); 
    // }

    public function val_edit_list(Request $request, $shop_id)
    {
        $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'shop_name' => ['required', 'min:3', 'max:15'],
                'shop_address' => ['required'],
                'at1st' => ['required'],
                'at2nd' => ['required'],
                'at3rd' => ['required'],
                'loss_alert' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect('add_shop')
                        ->withErrors($validator)
                        ->withInput();
        }
        $shop_list = shop::where('shop_id', $shop_id)->first();
        $shop_list->update([
            "shop_name" => $request->shop_name,
            "shop_address" => $request->shop_address,
            "at1st" => $request->at1st,
            "at2nd" => $request->at2nd,
            "at3rd" => $request->at3rd,
            "loss_alert" => $request->loss_alert,

        ]);

        return redirect("list_shop");

    }

    //店舗削除
    public function delete_list($shop_id)
    {
        shop::where('shop_id', $shop_id)->delete();
        // dd($delete_list);データ確認

        return redirect("list_shop");
    }

    //在庫一覧へ遷移する時に倉庫室等の情報を飛ばす
    public function item_shop_index($shop_id)
    {
        // dd($shop_id);データ確認
        $list = shop::where('shop_id', $shop_id)->first();
        //リレーション先のデータの取得
        $items = Item::where('shop_id', $shop_id)->get();
        return view("list_item", compact('list', 'items'));
    }

    //在庫登録へ遷移する時にユーザー・場所の情報を飛ばす
    public function add_item_index($shop_id)
    {
        // dd($shop_id);
        $list = shop::where('shop_id', $shop_id)->first();
        return view("add_item", compact('list'));
        // return view("edit_shop",compact('list'));
    }
}
