@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/supermarket-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">従業員一覧</p>

        <div class="row align-items-center mt-5">
            {{-- 店舗情報カード(始) --}}
            @foreach ($user as $user_list)
                <div class="col-4 d-flex align-items-center justify-content-center mt-3">
                    <div class="card" style="width: 18rem;">
                        {{-- 画像投稿チャレンジ --}}
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $user_list->name }}</h5>
                        </div>
                        <div class="user_posion">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    【役職】
                                </li>
                                <li class="list-group-item">
                                    {{-- hasOneの時の出力↓ --}}
                                    {{-- {{ isset($user_list->position->name) ? $user_list->position->name : '役職なし'}} --}}

                                    {{-- hasManyの時の出力↓ --}}
                                    @if (isset($user_list->position))
                                        @foreach ($user_list->position as $user_position)
                                            {{ $user_position['name'] }}
                                        @endforeach
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">【保有スキル】</li>
                            {{-- スキル開始 --}}
                            @if (isset($user_list->skills))
                                @foreach ($user_list->skills as $users_skill)
                                    <li class="list-group-item p-1">
                                        ・{{ $users_skill['name'] }}
                                        <a href="{{ route('delete_skill', [$user_list->id, $users_skill->id]) }}"><button
                                                type="button" class="btn-close" disabled aria-label="Close"></button></a>
                                    </li>
                                @endforeach
                            @endif
                            {{-- スキル終了 --}}
                        </ul>


                        <div class="d-flex align-items-center justify-content-center p-2">
                            <div class="give_skill text-center">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">スキル付与</button>
                                <ul class="dropdown-menu">
                                    @foreach ($skill as $skill_list)
                                        <li><a class="dropdown-item"
                                                href="{{ route('give_skill', [$user_list->id, $skill_list->id]) }}">{{ $skill_list->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
            {{-- 店舗情報カード(終) --}}
        </div>
    @endsection
</div>
