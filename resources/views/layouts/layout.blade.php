<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Laravel MyTodo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
    <!-- Styles -->
    <!--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <header class="header">
        <div class="header-container site-width">
            <h1>
                <a href="{{ url('top')}}" class="site-title">
                    Laravel MyTodo</a>
            </h1>
            <nav>
                <ul class="nav nav-pc">
                    @if(Auth::check())
                    <li>
                        <a href="{{ route('users.mypage', ['users' =>  Auth::id()]) }}">
                            <i class="fas fa-smile"></i><br>ようこそ, {{ Auth::user()->name }}さん
                        </a>
                    </li>
                    <li>
                        <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i><br>ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i><br>会員登録</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><br>ログイン</a>
                    </li>
                    @endif

                </ul>
            </nav>

        </div>
    </header>


    <div class="site-width">
        @yield('content')
    </div>


    @if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
    @endif
    @yield('scripts')


    <script type="text/javascript">
        document.getElementById("view_time").innerHTML = getNow();

        function getNow() {
            var now = new Date();
            var year = now.getFullYear();
            var mon = now.getMonth() + 1; 
            var day = now.getDate();
            var you = now.getDay();
            var youbi = new Array("日", "月", "火", "水", "木", "金", "土");

            //出力用
            var s = year + "年" + mon + "月" + day + "日(" + youbi[you] + ")";
            return s;
        }
    </script>


</body>

</html>