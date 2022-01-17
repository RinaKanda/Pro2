<!DOCTYPE html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="/css/all.css"> -->
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        body{
            background-color:#f5f5f5;
            margin-right: auto;
            margin-left: auto;
            /* width: 800; */
            font-size:20px;
        }
        #title{
            /* width: 600px; */
            margin-right: 10%;
            margin-left: 25%;
        }
        .border{
            border:solid 2px;
            width: 160px;
            text-align:center;
            margin-top: 50px;
            margin-right: auto;
            margin-left: auto;
        }
        button {
            background: none;
            border: none;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        
    /* new */
    .wrapper {
        height: 100%;
        width: 80%;
        /* weight:800px; */
        /* overflow-x: hidden; */
        overflow:auto;
        /* position: relative; */
        position:fixed;
        left:30%;
        top:15%;
        }
        .overlay {
        content: "";
        display: block;
        width: 0;
        height: 0;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        opacity: 0;
        transition: opacity .5s;
        }
        .overlay.open {
        width: 100%;
        height: 100%;
        /* opacity: 1; */
        }
        main {
        /* height: 100%; */
        /* min-height: 100vh; */
        width:50%;
        border:solid;
        background-color:green;
        padding: 10px 10px;
        background-color: #eee;
        transition: all .5s;
        display: flex;
        
        flex-direction: column;
        justify-content: center;
        }
        main h1 {
        text-align: center;
        font-weight: 500;
        }
        main p {
        text-align: center;
        }
        .menu-trigger {
        display: inline-block;
        width: 20%;
        height: 5%;
        vertical-align: middle;
        cursor: pointer;
        position: fixed;
        top: 10%;
        left: 20px;
        z-index: 100;
        transform: translateX(0);
        transition: transform .5s;
        font-size:20px;
        /* background-color:white; */
        }
        /* .menu-trigger.active {
        transform: translateX(250px);
        } */
        .menu-trigger span {
        display: inline-block;
        box-sizing: border-box;
        position: absolute;
        left: 0;
        width: 100%;
        height: 10px;
        background-color: #000;
        }
        .menu-trigger.active span {
        background-color: #fff;
        }
        /* .menu-trigger span:nth-of-type(1) {
        top: 0;
        }
        .menu-trigger.active span:nth-of-type(1) {
        transform: translateY(12px) rotate(-45deg);
        }
        .menu-trigger span:nth-of-type(2) {
        top: 12px;
        }
        .menu-trigger.active span:nth-of-type(2) {
        opacity: 0;
        }
        .menu-trigger span:nth-of-type(3) {
        bottom: 0;
        } */
        .menu-trigger.active span:nth-of-type(3) {
        transform: translateY(-12px) rotate(45deg);
        }

        nav {
        width: 27%;
        height: 100%;
        padding-top: 30px;
        /* background-color: snow; */
        border:solid;
        position: fixed;
        top: 15%;
        left: -27%;
        z-index: 10;
        /* transform: translate(250px); */
        transition: all .5s;
        }
        nav.open {
        transform: translate(105%);
        }
        nav li {
        /* color: #fff;
        text-align: center;
        padding: 10px 0; */
        }

        * {
        box-sizing: border-box;
        }
        ul {
        list-style: none;
        }

        /* link */
        #link{
            position:fixed;
            right:0;
            margin:3%;
            display: inline-block;
            font-size:20px;
        }
        a:link,a:visited{
            color:midnightblue;
        }    
        #reser {
            font-weight:bold;
            font-size:20px;
        }
        /* table */
        .table{
            /* width:400px; */
            background-color:green;
        }

        /*head */
        #head{
            font-size:2rem;
            font-weight:bold;
        }
    </style>
    <script>
        $(function(){
            $('.menu-trigger').on('click',function(){
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                    $('nav').removeClass('open');
                    $('.overlay').removeClass('open');
                } else {
                    $(this).addClass('active');
                    $('nav').addClass('open');
                    $('.overlay').addClass('open');
                }
            });
            $('.overlay').on('click',function(){
                if($(this).hasClass('open')){
                    $(this).removeClass('open');
                    $('.menu-trigger').removeClass('active');
                    $('nav').removeClass('open');      
                }
            });

            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
                // document.getElementById("button").disabled = false;
            });

            // if(true){
            //         $('#reser').text('AA様の現在の予約');
            // }
        });

        function select(){
            
        }
    </script>
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
            <!-- <form action="/logout" method="POST">
                <button>ログアウト</button>
            </form> -->
            @endauth
        </div>
    </div>
    
    <div class="wrapper">
        <main>
        <table class="table">
            <tr>
                <th>病院名</th> 
                <th>住所</th> 
            </tr> 
            <tr>
            @foreach($places as $key => $place)
                <tr class="colums" onclick="select({{ $place->place_id }})">
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->address }}</td>
                    @foreach($resdatas as  $resdata)
                        {{-- @if($resdata->year ==  2022 && $resdata->month == 03) --}}   
                        @foreach($resdata as $res)
                                <tr>
                                    <td>{{ $res->reservation_date }}</td>
                                    <td>{{ $res->mark }}</td>
                                </tr>
                            @endforeach
                        {{-- @endif --}}
                    @endforeach
                </tr>
            @endforeach
            </tr>   

        </table>
            <!-- <div class="border">
                <form action="/newRegister" method="post">
                    <input type="hidden" name="from" value="top">
                    @csrf
                    <button type="submit">新規登録</button>
                </form>
            </div>
            <div class="border">
                <form action="/newReserve" method="post">
                    @csrf
                    <input type="hidden" name="obje" value="new">
                    <button type="submit">新規予約</button><br>
                </form>
            </div>
            <div class="border">
                <form action="/login2" method="post">
                    @csrf
                    <input type="hidden" name="obje" value="conf">
                    <button type="submit">予約を確認・変更</button>
                </form>
            </div> -->
         </main>
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
        <nav>
            @guest
                ログインすれば予約見れます
            @endguest

            @auth
                @foreach($reserves as $reserve) 
                <div class="group">
                    接種券番号 <span class="lineon">{{ $auths ->tickets_number }}</span><br>
                    生年月日 <span class="lineon">{{ $auths ->birthday }}</span><br>
                    予約会場 <span class="lineon">{{ $reserve ->place_name }}</span><br>
                    予約日時<br> <span class="lineon">{{ $reserve ->reservation_date }}  {{ $reserve ->reservation_time }}</span><br>
                    <a href="">削除</a> <a href="/">変更</a>
                </div>
                @endforeach
            @endauth
            <!-- <ul>
            <li>MENU</li>
            <li>MENU</li>
            <li>MENU</li>
            </ul> -->
        </nav>
        <div class="overlay"></div>
    </div>
</body>   
</html>
