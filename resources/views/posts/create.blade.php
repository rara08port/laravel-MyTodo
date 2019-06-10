@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="main-section">
        <h2 class="section-title">
            <i class="fas fa-pencil-alt"></i>
            新規作成
        </h2>
        <form method="POST" action="{{ route('posts.create') }}">
            @csrf
            <input name="user_id" type="hidden" value="{{Auth::id()}}">
            <div class="form-group">

                <textarea id="body" name="body" class="write-text form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
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
                            <option value="{{ $category->category_num}}">
                                {{ $category->category_name}}
                            </option>
                            @endforeach

                        </select>
                    </div>
                    <span>タグ：</span>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="1" class="tag-select-box">
                        <div class="tag tag1"></div>
                    </label>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="2" class="tag-select-box">
                        <div class="tag tag2"></div>
                    </label>
                    <label class="tag-select">
                        <input type="radio" name="tag_num" value="3" checked="checked" class="tag-select-box">
                        <div class="tag tag3"></div>
                    </label>

                </div>

            </div>

            <div class="top-btn-group">
                <a class="btn btn-silver btn-twin" href="{{ route('top') }}">
                    キャンセル
                </a>

                <button type="submit" class="btn btn-orange btn-twin">
                    投稿する
                </button>
            </div>
        </form>
        
    </div>

</div>

@endsection