@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">{{ __('ルーム作成') }}</div>

                <div class="card-body">
                    <form method="POST" action="/add_room">
                        @csrf

                        <div class="row  mb-3">
                            <label for="room_name" class="col-md-4 col-form-label text-md-end">{{ __('ルーム名') }}</label>

                            <div class="col-md-6">
                                <input id="room_name" type="text" class="form-control @error('room_name') is-invalid @enderror" name="room_name" value="{{ old('room_name') }}" autocomplete="room_name" autofocus>

                                @error('room_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="room_intro" class="col-md-4 col-form-label text-md-end">{{ __('ルーム紹介文') }}</label>

                            <div class="col-md-6">
                                <textarea id="room_intro" class="form-control @error('room_intro') is-invalid @enderror" name="room_intro"
                                placeholder="例）今日飲みに行ける人集合ー！" value="{{ old('post') }}" autocomplete="room_intro"
                                ></textarea>

                                @error('room_intro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row  mb-3">
                            <label for="created_name" class="col-md-4 col-form-label text-md-end">{{ __('作成者') }}</label>

                            <div class="col-md-6">
                                <input id="created_name" type="text" class="form-control @error('created_name') is-invalid @enderror" name="created_name" value="<?php $user = Auth::user(); ?>{{ $user->name }}" required autocomplete="created_name" autofocus readonly>

                                @error('created_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成') }}
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
