@extends('layouts.app')
<?php use Carbon\Carbon; ?>

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('商品編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('edit_', [$items->item_id])}}">
                        @csrf

                        <input id="shop_id" type="hidden"
                        class="form-control @error('name') is-invalid @enderror" name="shop_id"
                        value="{{ $list->shop_id }}" required autocomplete="shop_id" autofocus>

                        <div class="row  mb-3">
                            <label for="item_name" class="col-md-4 col-form-label text-md-end">{{ __('商品名') }}</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="item_name"
                                    value="{{ $items->item_name }}" required autocomplete="item_name" autofocus>

                                @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="item_num" class="col-md-4 col-form-label text-md-end">{{ __('商品数（入り数）') }}</label>

                            <div class="col-md-6">
                                <input id="item_num" type="number"
                                    class="form-control @error('name') is-invalid @enderror" name="item_num"
                                    value="{{ $items->item_num }}" required autocomplete="item_num" autofocus>

                                @error('item_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="item_price" class="col-md-4 col-form-label text-md-end">{{ __('販売単価') }}</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number"
                                    class="form-control @error('name') is-invalid @enderror" name="item_price"
                                    value="{{ $items->item_price }}" required autocomplete="item_price" autofocus>

                                @error('item_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="item_loss" class="col-md-4 col-form-label text-md-end">{{ __('賞味期限') }}</label>

                            <div class="col-md-6">
                                <input id="item_loss" type="date"
                                    class="form-control @error('name') is-invalid @enderror" name="item_loss"
                                    value="" required autocomplete="item_loss" autofocus>

                                @error('item_loss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('担当者') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="user_name"
                                    value="<?php $user = Auth::user(); ?>{{ $user->name }}" required autocomplete="user_name" readonly>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集完了') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
