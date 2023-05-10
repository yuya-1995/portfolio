<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;

class TaskController extends Controller
{
    public function index_user()
    {
        $skill = Skill::all();
        $user = User::with(['skills', 'position'])->where('role', 2)->get();        
        $have = User::with('skills')->get();

        $skill_at = 2023-05-01;

        //リレーション先の絞り方

        $task1 = User::whereHas('post', function($query){
            $query->where('created_at', '>', '2023-05-05');
        })->get();

        $skill_name = 'メラメラ';

        $task2 = User::whereHas('skills', function($query) use ($skill_name) {
            $query->where('name', $skill_name);
        })->get();

        
        
        return view("list_worker", compact('user','skill','have'));
        
    }
}
