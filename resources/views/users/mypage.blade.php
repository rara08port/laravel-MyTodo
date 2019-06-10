@extends('layouts.layout')

@section('content')


<div class="container form-main">
    <h2>{{ __('MyPageメニュー') }}</h2>
    <button type="submit" class="btn btn-pink">
        <a class="" href="{{ route('users.categoryedit', ['user' => Auth::id()] )}}">
            カテゴリー変更
        </a>
    </button>

</div>

@endsection