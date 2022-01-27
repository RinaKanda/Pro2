<!DOCTYPE html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="/css/all.css"> -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<link rel="stylesheet" type="text/css" href="/css/top.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/layout.js"></script>
<style>
    .btn{
            /* 一旦リセット */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 0;
            border-radius: 0; 
            margin: 5px;
            background-color:lightgrey;
            color:black;
            font-size:13px;
        }
</style>
</head>

<body>
    <title>〇〇市ワクチン予約サイト</title>
    <div id="head"><span id="title">〇〇市ワクチン予約サイト</span>
        <div id ="link">
            @guest
            <a href="/register">新規登録</a> /
            <a href="/login">ログイン</a>
            @endguest
            @auth
            <a href="/logout">ログアウト</a>
            @endauth
        </div>
    </div>
    <div class="menu-trigger" href="">
            <div id="reser">
                @guest
                <a href="#">現在の予約</a>
                @endguest
                @auth
                <a href="#">{{$auths->name}}さんの予約</a>
                @endauth
            </div>
        </div>
        <div class="reser">
        <nav class="reser">
            @guest
                ログインをすれば現在の予約を見ることができます。<br>
                <div class="th"><br>
                    ログインは<a href="/login">こちら</a>
                </div>
            @endguest

            @auth
            @if($reserves != null)
                @foreach($reserves as $reserve) 
                <div class="group">
                    <form method="post">
                        @csrf
                    接種券番号 <span class="lineon">{{ $auths ->tickets_number }}</span><br>
                    生年月日 <span class="lineon">{{ $auths ->birthday }}</span><br>
                    予約会場 <span class="lineon">{{ $reserve ->place_name }}</span><br>
                    予約日時<br> <span class="lineon">{{ $reserve ->reservation_date }}  {{ $reserve ->reservation_time }}</span><br>
                    
                    <!-- <a href="/mypageD">削除</a> <a href="/change">変更</a> -->
                    <input type="hidden" name="keyresd" value="{{ $reserve->reservation_data_id }}">
                    <input type="hidden" name="keyres" value="{{$reserve->reserve_id}}">
                    <span class="inlineSet">
                        <button formaction="mypageD" type="submit" class="btn">削除</button>
                        <button formaction="" type="submit" class="btn">変更</button>
                    </span>
                    </form>
                </div>
                @endforeach

            @else
            <div class="th">予約は存在しません</div>
            @endif

            @endauth
            <!-- <ul>
            <li>MENU</li>
            <li>MENU</li>
            <li>MENU</li>
            </ul> -->
        </nav>
        </div>
        <!-- <div class="overlay"></div> -->
    </div>
    @yield('content')
</body>   
</html>