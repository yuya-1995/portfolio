<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; //バリデーション


class ItemController extends Controller
{
    // public function create(Request $request)

    // {
    //     Item::create([
    //         //   "shop_name" => $request->shop_name,
    //         'item_name' => $request->item_name,
    //         'item_num' => $request->item_num,
    //         'stock_at' => $request->stock_at,
    //         'item_price' => $request->item_price,
    //         'item_loss' => $request->item_loss,
    //         'user_name' => $request->user_name,
    //         'shop_id' => $request->shop_id,

    //     ]);

    //     $list = shop::where('shop_id', $request->shop_id)->first();
    //     // dd($list);データ確認
    //     $items = Item::where('shop_id',  $request->shop_id)->get();

    //     // return view("/list_item", compact('list','items'));
    //     return redirect("list_item/{$request->shop_id}");
    // }

    public function val_create(Request $request)

    {
        $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'item_name' => ['required', 'min:3', 'max:15'],
                'item_num' => ['required', 'integer'],
                'item_price' => ['required', 'integer'],
                'item_loss' => ['required'],
            ]
        );

        if ($validator->fails()) {

            return redirect("add_item/{$request->shop_id}")
                        ->withErrors($validator)
                        ->withInput();
        }

        Item::create([
            //   "shop_name" => $request->shop_name,
            'item_name' => $request->item_name,
            'item_num' => $request->item_num,
            'stock_at' => $request->stock_at,
            'item_price' => $request->item_price,
            'item_loss' => $request->item_loss,
            'user_name' => $request->user_name,
            'shop_id' => $request->shop_id,

        ]);

        $list = shop::where('shop_id', $request->shop_id)->first();
        // dd($list);データ確認
        $items = Item::where('shop_id',  $request->shop_id)->get();

        // return view("/list_item", compact('list','items'));
        return redirect("list_item/{$request->shop_id}");
    }

    public function delete_item($item_id)
    {



        $items = Item::where('item_id',  $item_id)->first();

        Item::where('item_id', $item_id)->delete();

        // // dd($shop_id);データ確認
        // $list = shop::where('shop_id', $request->shop_id)->first();

        return redirect("list_item/{$items->shop_id}");
    }

    public function edit_item_index($item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $list = shop::where('shop_id', $items->shop_id)->first();
        return view("edit_item", compact('items','list'));
        // return view("edit_shop",compact('item'));
    }

    // public function edit_item(Request $request, $item_id)
    // {
    //     $items = Item::where('item_id', $item_id)->first();
    //     $items->update([
    //         'item_name' => $request->item_name,
    //         'item_num' => $request->item_num,
    //         'item_price' => $request->item_price,
    //         'item_loss' => $request->item_loss,
    //         'user_name' => $request->user_name,
    //         'shop_id' => $request->shop_id,
    //     ]);
        

    //     return redirect("list_item/{$request->shop_id}");
    //     // return view("edit_shop",compact('list')); 
    // }

    public function val_edit_item(Request $request, $item_id)
    {
        $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'item_name' => ['required', 'min:3', 'max:15'],
                'item_num' => ['required', 'integer'],
                'item_price' => ['required', 'integer'],
                'item_loss' => ['required'],
            ]
        );

        if ($validator->fails()) {

            return redirect("edit_item/{$item_id}")
                        ->withErrors($validator)
                        ->withInput();
        }

        $items = Item::where('item_id', $item_id)->first();
        $items->update([
            'item_name' => $request->item_name,
            'item_num' => $request->item_num,
            'item_price' => $request->item_price,
            'item_loss' => $request->item_loss,
            'user_name' => $request->user_name,
            'shop_id' => $request->shop_id,
        ]);
        

        return redirect("list_item/{$request->shop_id}");
        // return view("edit_shop",compact('list')); 
    }


    public function move_item($item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $list = shop::where('shop_id', $items->shop_id)->first();
        return view("move_item", compact('items','list'));
    }

    public function move(Request $request, $item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $items->update([
            'stock_at' => $request->stock_at,
        ]);

        return redirect("list_item/{$request->shop_id}");
    }
    
    //下記スタイリッシュ案

    public function move1_item($item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $items->update([
            'stock_at' => 1,

        ]);

        return redirect("list_item/{$items->shop_id}");
    }

    public function move2_item($item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $items->update([
            'stock_at' => 2,
        ]);

        return redirect("list_item/{$items->shop_id}");
    }

    public function move3_item($item_id)
    {
        $items = Item::where('item_id', $item_id)->first();
        $items->update([
            'stock_at' => 3,
        ]);

        return redirect("list_item/{$items->shop_id}");
    }
    
}
