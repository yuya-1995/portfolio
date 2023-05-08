<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserSkill;
use App\Models\User;
use App\Models\position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //バリデーション


class SkillController extends Controller
{
    //スキル登録
    public function val_create(Request $request)
    {
        // ここにValidationを行うロジックを記述する
        // $request->validate(
        $validator = Validator::make($request->all(),
            [
                //バリデーションルールを記載（メッセージはvalidation.phpで編集）
                'skill_name' => ['required', 'min:3', 'max:15'],
            ]
        );

        if ($validator->fails()) {
            return redirect('add_skill')
                        ->withErrors($validator)
                        ->withInput();
        }
        //バリデーション通過後の処理
        Skill::create([
            "name" => $request->skill_name,
        ]);

        return redirect("home");
    }

    public function index_user()
    {
        $user = User::with(['skills', 'position'])->where('role', 2)->get();
        $skill = Skill::all();
        $have = User::with('skills')->get();
        
        return view("list_worker", compact('user','skill','have'));
        
    }

    public function give_skill($user_id,$skill_id)
    {
        $user = User::find($user_id);
        $user->skills()->syncWithoutDetaching($skill_id);
        return redirect("list_worker");
        
    }

    public function delete_skill($user_id,$skill_id)
    {
        $user = User::find($user_id);
        $user->skills()->detach($skill_id);
        return redirect("list_worker");
    }

}
