@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="main-section">
        <h2 class="section-title">
            <i class="fas fa-pencil-alt"></i>
            投稿の編集
        </h2>
        <form method="POST" action="{{ route('posts.edit', ['post' => $post]) }}">
            @csrf
            <input name="user_id" type="hidden" value="{{Auth::id()}}">
            <div class="form-group">

                <textarea id="body" name="body" class="write-text form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ $post->body }}</textarea>
                @if ($errors->has('body'))
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
                @endif
            </div>
            <div class="form-group">

                <div class="memo-regist">
                    <div class="memo-regist-option">
                        <span>カテゴリ選択:</span>
                        <select name="category_id" class="select-category write">
                            @foreach ($categories as $category)
                            <option value="{{ $category->category_num}}" @if($post->category_id == $category->category_num)
                                selected
                                @endif
                                >
                                {{ $category->category_name}}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    <span>タグ：</span>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="1" @if($post->tag_num == 1) checked="checked" @endif class="tag-select-box">
                        <div class="tag tag1"></div>
                    </label>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="2" @if($post->tag_num == 2) checked="checked" @endif class="tag-select-box">
                        <div class="tag tag2"></div>
                    </label>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="3" @if($post->tag_num == 3) checked="checked" @endif class="tag-select-box">
                        <div class="tag tag3"></div>
                    </label>



                    <a class="btn btn-pink" href="{{ route('users.categoryedit', ['user' => Auth::id()] )}}">
                        カテゴリー変更
                    </a>

                </div>
                
            </div>


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

</div>

@endsection