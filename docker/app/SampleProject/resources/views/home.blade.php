@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/cardboard_box-1.png" class="rounded mx-auto d-block md-5">

        {{-- 店舗メニュー --}}
        <div class="row justify-content-center">
            <div class="select justify-content-center">
                <p class="fs-3 text-center">shop</p>
                <div class="text-center">
                    <a href="list_shop"><button class="btn btn-outline-secondary " type="button"
                            id="button-addon1">店舗一覧</button></a>
                </div>
                @if (Auth::user()->role == 1)
                    <div class="add_shop text-center">
                        <a href="add_shop"><button class="btn btn-outline-secondary mt-3" type="button"
                                id="button-addon1">店舗登録</button></a>
                    </div>
                @endif
            </div>
            <div class="row justify-content-center mt-5">
                <div class="select justify-content-center">
                    <p class="fs-3 text-center">chat</p>
                    <div class="text-center">
                        <a href="list_room"><button class="btn btn-outline-secondary " type="button"
                                id="button-addon1">ルーム一覧</button></a>
                    </div>
                    <div class="add_shop text-center">
                        <a href="add_room"><button class="btn btn-outline-secondary mt-3" type="button"
                                id="button-addon1">ルーム作成</button></a>
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5">
                    <div class="select justify-content-center">
                        <p class="fs-3 text-center">skill</p>
                        <div class="text-center">
                            <a href="list_worker"><button class="btn btn-outline-secondary " type="button"
                                    id="button-addon1">社員一覧</button></a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="add_position"><button class="btn btn-outline-secondary " type="button"
                                    id="button-addon1">役職登録</button></a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="add_skill"><button class="btn btn-outline-secondary " type="button"
                                    id="button-addon1">スキル登録</button></a>
                        </div>
                        
                    </div>


                {{-- チャット機能（時間に余裕ができた場合） --}}
                <div class="transmission mt-5">
                    <p class="fs-3 text-center">
                        memo</p>
                    <div class="text-center">

                        <div class="container">
                            {{-- コメント開始 --}}
                            <div class="row chat bg-light d-flex justify-content-around">
                                {{-- 下記、同期通信 --}}
                                @foreach ($comments as $comment)
                                    @if (Auth::user()->id == $comment->user_id)
                                        <div class="col-7 card text-dark bg-light mb-3" style="max-width: 18rem;">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                {{ $comment->created_at }}
                                                <a href="{{route('delete_memo', [$comment->id])}}"><button type="button" class="btn-close" disabled
                                                    aria-label="Close"></button></a></div>
                                            <div class="card-body">
                                                <p class="card-text">{!! nl2br(htmlspecialchars($comment->comment)) !!}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                {{-- 下記、非同期通信 --}}
                                <div id="memo-data"></div> 

                                {{-- コメント終了 --}}
                            </div>
                        </div>

                    

                        {{-- ポスト部分 --}}
                        <form class="row row-cols-auto align-items-center mt-3" method="POST" action="/post">
                            @csrf
                            <div class="col-12">
                                <textarea id="memo" class="form-control bg-white" name="comment" placeholder="メモの内容" value="{{ old('post') }}"
                                    required autocomplete="comment"></textarea>
                            </div>
                            <input id="user_name" type="hidden" class="form-control" name="user_name"
                                value="<?php $users = Auth::user(); ?>{{ $users->name }}" required autocomplete="user_name" autofocus>
                            <input id="user_id" type="hidden" class="form-control" name="user_id"
                                value="<?php $users = Auth::user(); ?>{{ $users->id }}" required autocomplete="user_id" autofocus>

                            <div class="col-12 mt-2 justify-content-center">
                                <button class="btn btn-outline-secondary" type="submit" id="memo-btn">メモする</button>
                            </div>
                        </form>
                    </div>


                    {{-- 非同期通信 --}}
                        <div class="chat-container row justify-content-center mt-5">
                            <div class="chat-area">
                                <div class="card">
                                    <div class="card-header">Comment</div>
                                    <div class="card-body chat-card">
                                        {{-- @foreach ($chats as $item)
                                        @include('components.comment', ['item' => $item])
                                        @endforeach --}}

                                        {{-- 下記、非同期通信 --}}
                                        <div id="comment-data"></div> 
                                    </div>
                                </div>
                        

                        <div class="comment-container row justify-content-center">
                            <div class="input-group comment-area">
                                <textarea class="form-control" id="comment2" name="comment2" placeholder="input massage" aria-label="With textarea"></textarea>
                                <button id="ajax-btn" type="input-group-prepend button" class="btn btn-outline-primary comment-btn">Submit</button>
                            </div>
                        </div>

                    </div>
                    
</div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
<script src="{{ asset('js/comment.js') }}"></script>
<script src="{{ asset('js/memo.js') }}"></script>
@endsection
