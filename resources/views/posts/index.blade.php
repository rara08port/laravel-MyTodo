@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="content">
        <div class="main-content">
            <div class="mb-4">
                <a href="{{ route('posts.create') }}" class="btn btn-orange">
                    新規作成する
                </a>
            </div>
            <div class="main-section">
                <h2 class="section-title">
                    <i class="far fa-copy"></i>
                    メモ一覧
                </h2>
                <div class="memo-container">
                    @foreach($posts as $post)
                    <div class="memo-frame-main">
                        <div class="memo-frame-header">
                            <div class="category">
                                @foreach($categories as $category)
                                @if($category->category_num == $post->category_id)
                                {{$category->category_name}}
                                @endif
                                @endforeach

                            </div>
                            <div class="tags">
                                @if($post->tag_num == 1)
                                <div class="tag tag1"></div>
                                @elseif($post->tag_num ==2)
                                <div class="tag tag2"></div>
                                @elseif($post->tag_num ==3)
                                <div class="tag tag3"></div>
                                @endif

                            </div>

                        </div>
                        <p class="content-output">
                            {!! nl2br(e(str_limit($post->body, 200))) !!}
                        </p>
                        <div class="display-date">
                            投稿 日時 {{ $post->created_at->format('Y.m.d') }} 更新 日時 {{ $post->updated_at->format('Y.m.d') }}
                        </div>
                    </div>
                    <div class="memo-frame-sub">
                        <button class="memo-btn edit">
                            <a class="" href="{{ route('posts.edit', ['post' => $post]) }}">
                                編集
                            </a>
                        </button>



                        <form style="display: inline-block;" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                            @csrf
                            @method('DELETE')

                            <button class="memo-btn delete">削除</button>
                        </form>

                    </div>
                    @endforeach


                </div>
                <div class="f-flex justify-content-center page-center">
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
                </div>


            </div>

        </div>
        <div class="sub-content">
            <div class="main-section date">
                <p class="display-today">
                    <span id = "view_time"></span>
                </p>
            </div>
            <div class="main-section sidebar-fixed" id="search">
                <h2 class="section-title">
                    <i class="fas fa-search"></i>
                    カテゴリ検索
                </h2>
                <form method="get" action="{{ route('search') }}">
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
                        </div>
                    </div>
                    <button type="submit" class="btn btn-green">
                        検索する
                    </button>
                </form>
            </div>

            <div class="main-section sidebar-fixed" id="search2">
                <h2 class="section-title">
                    <i class="fas fa-search"></i>
                    タグ検索
                </h2>
                <form method="get" action="{{ route('search2') }}">
                    <div class="form-group">
                        <div class="memo-regist">
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
                    <button type="submit" class="btn btn-pink">
                        検索する
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>

@endsection