<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得
use Illuminate\Support\Facades\Validator; //バリデーション



class RoomController extends Controller
{
//     public function create(Request $request)  

// {  
//     // Log::debug($request);　何が入っているか確認できる
//     Room::create([ 
//       "room_name" => $request->room_name,
//       "room_intro" => $request->room_intro,
//       "created_name" => $request->created_name,
//       "user_id" => Auth::id(), //現在ログインしているアカウントIDの取得
//     ]); 

//     $room_list = Room::all();

//     return view("list_room", compact('room_list'));  
// }

public function val_create(Request $request)  

{  
    // ここにValidationを行うロジックを記述する
        // $request->validate(
            $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'room_name' => ['required', 'min:3', 'max:15'],
                'room_intro' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect('add_room')
                        ->withErrors($validator)
                        ->withInput();
        }
    Room::create([ 
      "room_name" => $request->room_name,
      "room_intro" => $request->room_intro,
      "created_name" => $request->created_name,
      "user_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    ]); 

    $room_list = Room::all();

    return view("list_room", compact('room_list'));  
}
    public function index()
        {
            $room_list = Room::all();
        
            return view("list_room", compact('room_list'));

        }

    public function delete_room($id)
    {
        Room::where('id', $id)->delete();
       
        return redirect("list_room");

    }

    public function edit_room_index($id)
    {
        $room = Room::where('id', $id)->first();
       
        return view('edit_room',compact('room'));

    }

    // public function edit_room(Request $request, $id)
    // {
    //     $edit_room = Room::where('id', $id)->first();
    //     $edit_room->update([  
    //         "room_name" => $request->room_name,
    //         "room_intro" => $request->room_intro,
    //         "created_name" => $request->created_name,
    //         "user_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    
    //     ]);  
       
    //     return redirect("list_room");

    // }
    public function val_edit_room(Request $request, $id)
    {
        // ここにValidationを行うロジックを記述する
        // $request->validate(
            $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'room_name' => ['required', 'min:3', 'max:15'],
                'room_intro' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect("edit_room/{$id}")
                        ->withErrors($validator)
                        ->withInput();
        }   
        $edit_room = Room::where('id', $id)->first();
        $edit_room->update([  
            "room_name" => $request->room_name,
            "room_intro" => $request->room_intro,
            "created_name" => $request->created_name,
            "user_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    
        ]);  
       
        return redirect("list_room");

    }

}
