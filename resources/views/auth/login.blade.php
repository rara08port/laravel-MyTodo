@extends('layouts.layout')

@section('content')


<div class="container">
    <form method="POST" action="{{ route('login') }}" class="form-main">
        @csrf
        <h2>{{ __('ログイン') }}</h2>

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
            <label class="form-label">{{ __('パスワード') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-box" name="password">

            @error('password')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group">
            <div class="button-group">
                <button type="submit" class="btn btn-silver btn-center">
                    {{ __('ログイン') }}
                </button>
            </div>
        </div>

    </form>
</div>


@endsection