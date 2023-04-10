@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/img/bagel-1.png" class="rounded mx-auto d-block md-5">
        <p class="fs-3 text-center mt-4">【{{ $list->shop_name }}】<br>在庫一覧</p>
        @if (Auth::user()->role == 2)
                <div class="edit_shop text-center">
                    <a href="{{route('add_item', [$list->shop_id])}}"><button class="btn btn-outline-secondary mt-3"
                            type="button" id="">商品登録</button></a>
                </div>
                
            @endif
            

        <div class="row align-items-center mt-5">
            {{-- at1st --}}
            <div class="table-responsive">
            <table class="table table-striped caption-top table-hover text-nowrap">
                <caption class=>
                    <p class="fs-5">倉庫室場所 : {{ $list->at1st }}</p>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th>商品数（入り数）</th>
                        <th>販売単価</th>
                        <th>賞味期限</th>
                        <th>担当者</th>
                        <th>最終更新時間</th>
                        @if (Auth::user()->role == 2)
                        <th class="text-center" colspan="3">操作</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    {{-- 在庫詳細（始） --}}
                    @foreach ($items as $item)
                    @if($item->stock_at == 1)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->item_num }}</td>
                        <td>{{ $item->item_price }}</td>
                        <td>{{ $item->item_loss }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        @if (Auth::user()->role == 2)
                        <td class="text-center">
                            <div class="edit_shop text-center">
                                <a href="{{route('move_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                        type="button" id="">移動</button></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{route('edit_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">編集</button></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('delete_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">削除</button></a>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                    {{-- @endif --}}
                    {{-- 在庫詳細（終） --}}
                </tbody>
            </table>
        </div>


            {{-- at2nd --}}
            <div class="table-responsive">
            <table class="table table-striped caption-top table-hover mt-4 text-nowrap">
                <caption class=>
                    <p class="fs-5">中継 : {{ $list->at2nd }}</p>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th>商品数（入り数）</th>
                        <th>販売単価</th>
                        <th>賞味期限</th>
                        <th>担当者</th>
                        <th>最終更新時間</th>
                        @if (Auth::user()->role == 2)
                        <th class="text-center" colspan="3">操作</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    {{-- 在庫詳細（始） --}}
                    @foreach ($items as $item)
                    @if($item->stock_at == 2)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->item_num }}</td>
                        <td>{{ $item->item_price }}</td>
                        <td>{{ $item->item_loss }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        @if (Auth::user()->role == 2)
                        <td class="text-center">
                            <div class="edit_shop text-center">
                                <a href="{{route('move_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                        type="button" id="">移動</button></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{route('edit_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">編集</button></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('delete_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">削除</button></a>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                    {{-- @endif --}}
                    {{-- 在庫詳細（終） --}}
                </tbody>
            </table>
            </div>

            {{-- at3rd --}}
            <div class="table-responsive">
            <table class="table table-striped caption-top table-hover mt-4 text-nowrap">
                <caption class=>
                    <p class="fs-5">販売場所 : {{ $list->at3rd }}</p>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th>商品数（入り数）</th>
                        <th>販売単価</th>
                        <th>賞味期限</th>
                        <th>担当者</th>
                        <th>最終更新時間</th>
                        @if (Auth::user()->role == 2)
                        <th class="text-center" colspan="3">操作</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    {{-- 在庫詳細（始） --}}
                    @foreach ($items as $item)
                    @if($item->stock_at == 3)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->item_num }}</td>
                        <td>{{ $item->item_price }}</td>
                        <td>{{ $item->item_loss }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        @if (Auth::user()->role == 2)
                        <td class="text-center">
                            <div class="edit_shop text-center">
                                <a href="{{route('move_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                        type="button" id="">移動</button></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{route('edit_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">編集</button></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('delete_item', [$item->item_id])}}"><button class="btn btn-outline-secondary"
                                type="button" id="">削除</button></a>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                    {{-- @endif --}}
                    {{-- 在庫詳細（終） --}}
                </tbody>
            </table>
            </div>
            
            <div class="mt-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button p-3 mb-2 bg-body text-dark collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    【{{ $list->shop_name }}】在庫合計
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    りんごの合計:○○個<br>
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
