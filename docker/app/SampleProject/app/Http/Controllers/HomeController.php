<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //現在ログインしているアカウントIDの取得
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $comments = Post::all();

        $chats = Comment::get();
        return view('home', compact('user', 'comments', 'chats'));
    }
    public function getData()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }

    public function temp(Request $request)
    {
        return response()->json($request);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        // $comment = $request->input('comment');
        $comment = Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $request->comment
        ]);
        return response()->json($comment);
        // return redirect('home');
    }
}
