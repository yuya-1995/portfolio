<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class OldTestController extends Controller
{
    public function index(Request $request) {
        return view('oldtest');
    }

    public function send(Request $request) {
        $request->validate([
            'name' => 'min:3|required',
            'email' => 'email|required'
        ]);
    }
}
