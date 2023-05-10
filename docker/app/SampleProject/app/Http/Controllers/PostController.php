<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // public function getData()
    // {
    //     $comments = Post::orderBy('created_at', 'desc')->get();
    //     $json = ["comments" => $comments];
    //     return response()->json($json);
    // }
    public function post(Request $request)
    {
        $add_post = Post::create([
            'user_name' => $request->user_name,
            'comment' => $request->comment,
            'user_id' => $request->user_id,
        ]);

        return redirect('home');
        // return response()->json($add_post);

    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        return redirect('home');
    }
}
