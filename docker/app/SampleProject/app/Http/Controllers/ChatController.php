<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得


class ChatController extends Controller
{
    public function chat_index($id)
    {
        $comments = Chat::all();
        $room = Room::where('id', $id)->first();
        
        return view("room", compact('comments','room'));

    }

    public function chat_post(Request $request, $id)
    {
        Chat::create([
            'user_name' => $request->user_name,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
        ]);
        

        return redirect("room/{$id}");

    }

}
