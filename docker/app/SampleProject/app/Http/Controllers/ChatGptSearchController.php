<?php

namespace App\Http\Controllers;

use App\Models\ChatGptConversation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class ChatGptSearchController extends Controller
{
    public function index()
    {
        // return Inertia::render('ChatGptSearch');
        return view('ChatGptSearch');
    }

    // public function list(Request $request)
    // {
    //     // 注意： 今回検索はメインどころではないのでキーワードはひとつでページ送りも実装していません
    //     $keyword = $request->keyword;

    //     $conversations = ChatGptConversation::query()
    //         ->with('parent', 'child')
    //         ->where('message', 'LIKE', "%{$keyword}%")
    //         ->orWhere('topic', 'LIKE', "%{$keyword}%")
    //         ->latest()
    //         ->limit(10)
    //         ->get();

    //     return [
    //         'conversations' => $conversations,
    //     ];
    // }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 文章
        $sentence = $request->input('sentence');

        // ChatGPT API処理
        $chat_response = $this->chat_gpt("日本語で応答してください", $sentence);

        return view('ChatGptSearch', compact('sentence', 'chat_response'));
    }

    function chat_gpt($system, $user)
    {
        // ChatGPT APIのエンドポイントURL
        $url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $api_key = env('CHAT_GPT_KEY');

        // ヘッダー
        $headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "Bearer $api_key"
        );

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $response = Http::withHeaders($headers)->post($url, $data);

        if ($response->json('error')) {
            // エラー
            return $response->json('error')['message'];
        }

        return $response->json('choices')[0]['message']['content'];
    }
}
