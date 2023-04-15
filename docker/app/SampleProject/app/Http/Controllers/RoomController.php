<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得


class RoomController extends Controller
{
    public function create(Request $request)  

{  
    // Log::debug($request);　何が入っているか確認できる
    Room::create([ 
      "room_name" => $request->room_name,
      "room_intro" => $request->room_intro,
      "created_name" => $request->created_name,
      "user_id" => Auth::id(), //現在ログインしているアカウントIDの取得
    ]); 

    return redirect("home");  
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

    public function edit_room(Request $request, $id)
    {
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
