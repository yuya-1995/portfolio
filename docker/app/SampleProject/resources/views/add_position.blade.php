@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('役職登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="/do_add_position">
                        @csrf

                        <div class="row  mb-3">

                            <div class="row  mb-3">
                                <label for="stock_at" class="col-md-4 col-form-label text-md-end">{{ __('対象者') }}</label>
    
                                <div class="col-md-6">
                                    <select id="user_id" type="select"
                                        class="form-control @error ('user_id') is-invalid @endif" name="user_id"
                                        value="{{ old('user_id') }}" autocomplete="user_id" autofocus>
                                        <option selected>対象者を選択してください</option>
                                        @foreach($users as $user)
                                        <option value={{ $user->id }}>{{ $user->name }}</option>
                                        @endforeach

                                        @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    </select>

                                    
                                </div>   
                            
                            <label for="shop_name" class="col-md-4 col-form-label text-md-end mt-3">{{ __('役職名') }}</label>

                            <div class="col-md-6 mt-3">
                                <input id="name" type="text" class="form-control @error('position_name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                
                                @error('position_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('役職登録') }}
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
