@extends('layouts.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('users.categoryedit', ['user' => Auth::id()]) }}" class="form-main">
        @csrf
        <h2>{{ __('カテゴリ変更') }}</h2>

        <div class="form-group">
            @foreach($categories as $category)
            {{ $category->category_name}}
            @if($category->category_num == 0)
            <input name="category_name0" type="text" class="input-box" value="{{$category->category_name}}"><br>
            @elseif($category->category_num == 1)
            <input name="category_name1" type="text" class="input-box" value="{{$category->category_name}}"><br>
            @elseif($category->category_num == 2)
            <input name="category_name2" type="text" class="input-box" value="{{$category->category_name}}"><br>
            @elseif($category->category_num == 3)
            <input name="category_name3" type="text" class="input-box" value="{{$category->category_name}}"><br>
            @elseif($category->category_num == 4)
            <input name="category_name4" type="text" class="input-box" value="{{$category->category_name}}"><br>
            @endif

            @endforeach


            <div class="top-btn-group">
                <a class="btn btn-silver btn-twin" href="{{ route('top') }}">
                    キャンセル
                </a>

                <button type="submit" class="btn btn-orange btn-twin">
                    更新する
                </button>
            </div>

    </form>
</div>

@endsection