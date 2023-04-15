@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/supermarket-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">ルーム一覧</p>

        <div class="row align-items-center mt-5">
            {{-- 店舗情報カード(始) --}}
            @foreach ($room_list as $list)
            <div class="col-4 d-flex align-items-center justify-content-center">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{ $list->room_name }}</div>
                    <div class="card-body text-dark">
                        <p class="card-text">{!! nl2br(htmlspecialchars($list->room_intro)) !!}</p>
                        <p class="card-text">作成者：{{ $list->created_name }}</p>
                        


                        <div class="list_item text-center">
                            <a href="{{route('room', [$list->id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                    id="{{ $list->id }}">参加</button></a>
                        </div>

                        @if (Auth::user()->id == $list->user_id)
                            <div class="edit_shop text-center">
                                <a href="{{route('edit_room', [$list->id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                        id="{{ $list->id }}">ルーム編集</button></a>
                            </div>
                            <div class="delete_shop text-center">
                                <a href="{{route('delete_room', [$list->id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                        id="{{ $list->id }}" onClick="delete_alert(event);return false;">ルーム削除</button></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            {{-- 店舗情報カード(終) --}}
        </div>

    </div>
@endsection
