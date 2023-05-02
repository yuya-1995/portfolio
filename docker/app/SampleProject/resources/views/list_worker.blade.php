@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/supermarket-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">従業員一覧</p>

        <div class="row align-items-center mt-5">
            {{-- 店舗情報カード(始) --}}
            @foreach ($user as $user_list)
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="card" style="width: 18rem;">
                        {{-- 画像投稿チャレンジ --}}
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $user_list->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">保有スキル</li>
                            {{-- スキル開始 --}}
                            @foreach ($have as $user_info)
                                @if ($user_list->id == $user_info->id)
                                    @foreach ($user_info['skills'] as $users_skill)
                                        <li class="list-group-item p-1">
                                            ・{{ $users_skill['name'] }}
                                            <a href="{{ route('delete_skill', [$user_list->id, $users_skill->id]) }}"><button
                                                    type="button" class="btn-close" disabled
                                                    aria-label="Close"></button></a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                            {{-- スキル終了 --}}

                        </ul>
                        <div class="d-flex align-items-center justify-content-center p-4">
                            <div class="edit_shop text-center">
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
