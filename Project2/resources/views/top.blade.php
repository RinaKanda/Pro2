<!DOCTYPE html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="/css/all.css"> -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
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
        height: 80%;
        width: 80%;
        /* weight:800px; */
        overflow-x: hidden;
        
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
        height: 100%;
        min-height: 100vh;
        width:80%;
        border:solid;
        background-color:green;
        padding: 10px 10px;
        background-color: #eee;
        transition: all .5s;
        overflow:auto;
        /* display: flex; */
        
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
        /* .menu-trigger span {
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
        } */
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
        display:none;
        width: 27%;
        height: 80%;
        padding-top: 30px;
        /* background-color: snow; */
        border:solid;
        position: fixed;
        top: 15%;
        left: 2%;
        z-index: 10;
        /* transform: translate(250px); */
        /* transition: all .5s; */
        }
        /* nav.open {
        display:
        } */
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
            /* background-color:green; */
        }

        /*head */
        #head{
            font-size:2rem;
            font-weight:bold;
        }
        /* accordion */
        .sub-menu-nav {
            /* position: fixed; */
            /* background: #033560;
            color: #fff; */
            height:90%;
            top: 0;
            padding-top: 90px;
            left: 260px;
            /* width: 0; */
            height: 100%;
            overflow: hidden;
            transition: width .2s ease-out;
        }
        
        #not-active {
            display:none;
        }

        #global-nav .sub-menu:hover .sub-menu-nav {
            width: 230px;
        }
        #global-nav ul {
            list-style: none;
            margin-left: 0;
        }
        #global-nav > ul > li {
            position: relative;
        }
        .is-active{
            display:flow;
        }
        .reser{
            display:none;
        }
    </style>
    <script>
        $(function(){
            // $('.menu-trigger').on('click',function(){
            //     if($(this).hasClass('active')){
            //         $(this).removeClass('active');
            //         $('nav').removeClass('open');
            //         $('.overlay').removeClass('open');
            //     } else {
            //         $(this).addClass('active');
            //         $('nav').addClass('open');
            //         $('.overlay').addClass('open');
            //     }
            // });
            $('.menu-trigger').on('click',function(){
                $(".reser").toggle();
                
            });
            // $('.overlay').on('click',function(){
            //     if($(this).hasClass('open')){
            //         $(this).removeClass('open');
            //         $('.menu-trigger').removeClass('active');
            //         $('nav').removeClass('open');      
            //     }
            // });

            $('.sub-menu').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");

               
                // $("*").removeClass('sub-menu-nav-ac');
                // $(this).siblings().removeClass('not-active');
                // if($(".sub-menu-nav").is(':visible')){
                //     $(".sub-menu-nav").is(':visible').toggle();
                // }
                $(this).siblings().toggle();
                // document.getElementById("button").disabled = false;
            });


            $('.sub-menu').click(function () {
                
            });
        // });
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
            @endauth
        </div>
    </div>
    
    <div class="wrapper">
        <main>
        <table class="table">
            <tr>
                <th>病院名</th> 
                <th>住所</th>
                <!-- <th>日付</th>  -->
            </tr> 
            <tr>
            <nav id="global-nav">
            @foreach($places as $key => $place)
            <tbody>
                <tr class="sub-menu" onclick="select()">
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->address }}</td>
                    <tr class="sub-menu-nav" id="not-active">
                    <td id ="">日付</td>
                    @foreach($resdatas as  $resdata)
                        {{-- @if($resdata->year ==  2022 && $resdata->month == 03) --}}   
                        <!-- <tr> -->
                        @foreach($resdata as $res)
                        <tr class="sub-menu-nav" id="not-active">
                                <td colspan="2">
                                <div>
                                        {{ $res->reservation_date }}
                                        {{ $res->mark }}
                                </div>
                                </td>
                        </tr>
                            @endforeach
                        {{-- @endif --}}
                        <!-- </tr> -->
                    @endforeach
    </tr>
                </tr>
            </tbody>
            @endforeach
            </tr>   

        </table>
            
         </main>
        <!-- 共通 -->
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
        </div>
        <div class="overlay"></div>
    </div>
</body>   
</html>
