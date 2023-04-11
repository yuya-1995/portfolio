@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/supermarket-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">店舗一覧</p>

        <div class="row align-items-center mt-5">
            {{-- 店舗情報カード(始) --}}
            @foreach ($shop_list as $list)
            <div class="col-4 d-flex align-items-centerjustify-content-center">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{ $list->shop_name }}</div>
                    <div class="card-body text-dark">
                        <p class="card-text">{{ $list->shop_address }}</p>

                        <div class="list_item text-center">
                            <a href="{{route('list_item', [$list->shop_id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                    id="list_item">在庫</button></a>
                        </div>
                        @if (Auth::user()->role == 1)
                            <div class="edit_shop text-center">
                                <a href="{{route('edit_shop', [$list->shop_id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                        id="{{ $list->shop_id }}<">店舗編集</button></a>
                            </div>
                            <div class="delete_shop text-center">
                                <a href="{{route('delete', [$list->shop_id])}}"><button class="btn btn-outline-secondary mt-3" type="button"
                                        id="{{ $list->shop_id }}<">店舗削除</button></a>
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
