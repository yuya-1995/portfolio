@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('店舗登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="/add_shop">
                        @csrf

                        <div class="row  mb-3">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-end">{{ __('店舗名') }}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name') }}" autocomplete="shop_name" autofocus>

                                
                                @error('shop_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="shop_address" class="col-md-4 col-form-label text-md-end">{{ __('店舗住所') }}</label>

                            <div class="col-md-6">
                                <input id="shop_address" type="text" class="form-control @error('shop_address') is-invalid @enderror" name="shop_address" value="{{ old('shop_address') }}" autocomplete="shop_address" autofocus>

                                @error('shop_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="at1st" class="col-md-4 col-form-label text-md-end">{{ __('倉庫室場所') }}</label>

                            <div class="col-md-6">
                                <input id="at1st" type="text" class="form-control @error('at1st') is-invalid @enderror" name="at1st" value="{{ old('at1st') }}" autocomplete="at1st" autofocus>

                                @error('at1st')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="at2nd" class="col-md-4 col-form-label text-md-end">{{ __('中継') }}</label>

                            <div class="col-md-6">
                                <input id="at2nd" type="text" class="form-control @error('at2nd') is-invalid @enderror" name="at2nd" value="{{ old('at2nd') }}" autocomplete="at2nd" autofocus>

                                @error('at2nd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="at3rd" class="col-md-4 col-form-label text-md-end">{{ __('販売場所') }}</label>

                            <div class="col-md-6">
                                <input id="at3rd" type="text" class="form-control @error('at3rd') is-invalid @enderror" name="at3rd" value="{{ old('at3rd') }}" autocomplete="at3rd" autofocus>

                                @error('at3rd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="loss_alert" class="col-md-4 col-form-label text-md-end">{{ __('ロスアラート') }}</label>

                            <div class="col-md-6">
                                <input id="loss_alert" max="30" min="0" type="number" class="form-control @error('loss_alert') is-invalid @enderror" name="loss_alert" value="{{ old('loss_alert') }}" autocomplete="loss_alert" autofocus>

                                @error('loss_alert')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('店舗登録') }}
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
