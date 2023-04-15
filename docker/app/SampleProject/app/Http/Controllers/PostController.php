<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Request $request)
    {
        Post::create([
            'user_name' => $request->user_name,
            'comment' => $request->comment,
            'user_id' => $request->user_id,
        ]);

        return redirect('home');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();

        return redirect('home');
    }
}
