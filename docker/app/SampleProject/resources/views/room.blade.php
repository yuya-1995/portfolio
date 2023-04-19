@extends('layouts.app')
<?php use Carbon\Carbon; ?>

@section('content')
    <div class="container">
        <img src="/img/bagel-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">【{{ $room->room_name }}】</p>
        


        <div class="transmission mt-5">
            

                <div class="container">
                    {{-- コメント開始 --}}
                    <div class="chat bg-light">
                        @foreach($comments as $comment)
                        @if($room->id == $comment->room_id)
                        @if(Auth::user()->id == $comment->user_id)
                        <div class="message d-flex flex-row-reverse align-items-start mb-3">
                            <div class="message-icon rounded-circle bg-secondary text-white fs-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <p class="message-text text-start p-3 me-1 mb-0 bg-info rounded-pill">
                                {!! nl2br(htmlspecialchars($comment->comment)) !!}
                            </p>
                            <div class="fs-8 me-1 align-self-end">{{ $comment->created_at }}</div>
                        </div>
                        @else
                        <div class="message d-flex flex-row align-items-start mb-1">
                            <div class="message-icon">
                                <i class="fs-8">{{ $comment->user_name }}:</i>
                            </div>
                        </div>
                        <div class="message d-flex flex-row align-items-start mb-3">
                            <p class="message-text text-start p-3 ms-1 mb-0 bg-warning rounded-pill">
                                {!! nl2br(htmlspecialchars($comment->comment)) !!}
                            </p>
                            <div class="fs-8 ms-1 align-self-end">{{ $comment->created_at }}</div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                        {{-- コメント終了 --}}
                    </div>
                </div>

                {{-- ポスト部分 --}}
                <form class="row row-cols-auto align-items-center mt-3" method="POST" action="{{ route('chat_post', [$room->id]) }}">
                    @csrf
                    <div class="col-12">
                        <textarea id="comment" class="form-control bg-white" name="comment"
                            placeholder="何を伝えましょうか？" value="{{ old('post') }}" required autocomplete="comment"
                            ></textarea>
                    </div>
                    <input id="user_name" type="hidden" class="form-control" name="user_name"
                        value="<?php $users = Auth::user(); ?>{{ $users->name }}" required autocomplete="user_name" autofocus>
                    <input id="room_id" type="hidden" class="form-control" name="room_id"
                        value="{{ $room->id }}" required autocomplete="room_id" autofocus>
                        

                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <button class="btn btn-outline-secondary " type="submit" id="button-addon1">送信</button>
                    </div>
                </form>

            </div>
    </div>
@endsection
