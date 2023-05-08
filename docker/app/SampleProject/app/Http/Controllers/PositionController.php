<?php

namespace App\Http\Controllers;

use App\Models\position;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //バリデーション



class PositionController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("add_position", compact('users'));
    }

    public function add(Request $request)
    {
        position::create([
          
            'name' => $request->name,
            'user_id' => $request->user_id,

        ]);

        $user = User::where('role', 2)->get();
        $skill = Skill::all();
        $have = User::with('skills')->get();
        $position = User::with('position')->get();
        
        return view("list_worker", compact('user','skill','have','position'));
    }


}
