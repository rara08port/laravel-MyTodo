@extends('layouts.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('register') }}" class="form-main">
        @csrf
        <h2>{{ __('ユーザー登録') }}</h2>
        <div class="form-group">
            <label class="form-label">{{ __('名前') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input-box" name="name" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">{{ __('E-Mail アドレス') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-box" name="email" value="{{ old('email') }}">

            @error('email')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group">
            <label class="form-label">{{ __('パスワード') }}(＊6文字以上)</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-box" name="password">

            @error('password')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group">
            <label class="form-label">{{ __('パスワード確認') }}</label>
            <input id="password-confirm" type="password" class="form-control input-box" name="password_confirmation">

        </div>

        <div class="form-group">
            <div class="button-group">
                <button type="submit" class="btn btn-orange btn-center">
                    {{ __('ユーザー登録') }}
                </button>
            </div>
        </div>

    </form>
</div>

@endsection