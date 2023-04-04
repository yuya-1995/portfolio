@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/cardboard_box-1.png" class="rounded mx-auto d-block md-5">

        {{-- 店舗メニュー --}}
        <div class="row justify-content-center">
            <div class="select justify-content-center">
                <p class="fs-3 text-center">menu</p>
                <div class="text-center">
                    <a href="list_shop"><button class="btn btn-outline-secondary " type="button" id="button-addon1">店舗一覧</button></a>
                </div>
                @if (Auth::user()->role == 1)
                <div class="add_shop text-center">
                    <a href="add_shop"><button class="btn btn-outline-secondary mt-3" type="button" id="button-addon1">店舗登録</button></a>
                </div>
                @endif
            </div>
            {{-- チャット機能（時間に余裕ができた場合） --}}
            <div class="transmission justify-content-center mt-5">
                <p class="fs-3 text-center">transmission</p>
                <div class="text-center">
                    チャット機能実装予定
                </div>
                
            </div>

            {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
