@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/cardboard_box-1.png" class="rounded mx-auto d-block md-5">

        {{-- 店舗メニュー --}}
        <div class="row justify-content-center">
            <div class="select justify-content-center">
                <p class="fs-3 text-center">menu</p>
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
            {{-- チャット機能（時間に余裕ができた場合） --}}
            <div class="transmission justify-content-center mt-5">
                <p class="fs-3 text-center">transmission</p>
                <div class="text-center">

                    <div class="container">
                        {{-- コメント開始 --}}
                        <div class="chat bg-light">
                            @foreach($comments as $comment)
                            @if(Auth::user()->id == $comment->user_id)
                            <div class="message d-flex flex-row-reverse align-items-start mb-2">
                                <div class="message-icon rounded-circle bg-secondary text-white fs-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <p class="message-text p-2 me-2 mb-0 bg-info rounded-pill">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                            @else
                            <div class="message d-flex flex-row align-items-start mb-2">
                                <div class="message-icon rounded-circle bg-secondary text-white fs-3">
                                    <i class="fas fa-user"></i>
                                </div>
                                <p class="message-text p-3 ms-2 mb-0 bg-warning rounded-pill">
                                    {{ $comment->user_name }}:{{ $comment->comment }}
                                </p>
                            </div>
                            @endif
                            @endforeach
                            {{-- コメント終了 --}}
                        </div>
                    </div>


                    <form class="row row-cols-auto align-items-center mt-3" method="POST" action="/post">
                        @csrf
                        <div class="col-12">
                            <input id="comment" type="text" class="form-control bg-white" name="comment"
                                placeholder="何を伝えましょうか？" value="{{ old('post') }}" required autocomplete="comment"
                                autofocus>
                        </div>
                        <input id="user_name" type="hidden" class="form-control" name="user_name"
                            value="<?php $users = Auth::user(); ?>{{ $users->name }}" required autocomplete="user_name" autofocus>
                        <input id="user_id" type="hidden" class="form-control" name="user_id"
                            value="<?php $users = Auth::user(); ?>{{ $users->id }}" required autocomplete="user_id" autofocus>

                        <div class="col-12 mt-2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">送信</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
