@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('スキル登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="/add_skill">
                        @csrf

                        <div class="row  mb-3">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-end">{{ __('スキル名') }}</label>

                            <div class="col-md-6">
                                <input id="skill_name" type="text" class="form-control @error('skill_name') is-invalid @enderror" name="skill_name" value="{{ old('skill_name') }}" autocomplete="skill_name" autofocus>

                                
                                @error('skill_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('スキル登録') }}
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
