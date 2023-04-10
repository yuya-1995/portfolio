@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('商品移動') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('move', [$items->item_id])}}">
                        @csrf

                        <input id="shop_id" type="hidden"
                                    class="form-control @error('name') is-invalid @enderror" name="shop_id"
                                    value="{{ $list->shop_id }}" required autocomplete="shop_id" autofocus>                        

                        <div class="row  mb-3">
                            <label for="stock_at" class="col-md-4 col-form-label text-md-end">{{ __('移動先') }}</label>

                            <div class="col-md-6">
                                <select id="stock_at" type="select"
                                    class="form-control @error('name') is-invalid @enderror" name="stock_at"
                                    value="{{ old('stock_at') }}" required autocomplete="stock_at" autofocus>
                                    <option value="1">{{ $list->at1st }}</option>
                                    <option value="2">{{ $list->at2nd }}</option>
                                    <option value="3">{{ $list->at3rd }}</option>
                                </select>
                                @error('stock_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('移動') }}
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
