@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="top-img">
        <p class="top-phrase"><span class="top-phrase-keyword">MyTodo</span>は、<br>
            Laravelを使用して作った、記録、カテゴリ、検索できる
            <span class="under-line">メモアプリ</span>です。</p>
        <img class="logo" src="{{ asset('img/notepad.png') }}">
    </div>

    <div class="top-btn-group">

        <div class="btn btn-orange btn-twin">
            <a href="{{ route('register') }}">
                登録する
            </a>
        </div>
        <div class="btn  btn-silver btn-twin">
            <a href="{{ route('login') }}">
                ログイン
            </a>
        </div>
    </div>
</div>

@endsection