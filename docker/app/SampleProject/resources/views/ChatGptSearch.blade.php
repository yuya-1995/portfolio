@extends('layouts.app')

@section('content')
     {{-- フォーム --}}
     <form method="POST" action="ChatGptSearch_post">
        @csrf
        <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
        <button type="submit">ChatGPT</button>
    </form>

    {{-- 結果 --}}
    {{ isset($chat_response) ? $chat_response : '' }}
@endsection
