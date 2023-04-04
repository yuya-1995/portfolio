<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Log::debug($request);　何が入っているか確認できる
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得

class ShopController extends Controller
{
    // 主　→ 従
    // $area_tokyo = Area::find(1)->shops->toArray();
    // 主　← 従
    // $shop = Shop::find(2)->area->name;
    // dd($area_tokyo, $shop);

    public function create(Request $request)  

{  
    // Log::debug($request);　何が入っているか確認できる
    shop::create([ 
      "shop_name" => $request->shop_name,
      "shop_address" => $request->shop_address,
      "at1st" => $request->at1st,
      "at2nd" => $request->at2nd,
      "at3rd" => $request->at3rd,
      "loss_alert" => $request->loss_alert,
      "users_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    ]);  

    return redirect("home");  
}
//DBから店舗情報を全て取得
public function index(Request $shop_list)
    {
        $shop_list = shop::all();
        // $shop_list = shop::where('users_id', Auth::id())->get();
        // Log::debug($shop_list);
        return view("list_shop", ['list_shop' => $shop_list ]);

    }

}


