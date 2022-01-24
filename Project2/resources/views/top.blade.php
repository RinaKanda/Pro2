<!DOCTYPE html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="/css/all.css"> -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        body{
            /* background-color:#f5f5f5; */
            margin-right: auto;
            margin-left: auto;
            /* width: 800; */
            font-size:20px;
        }
    </style>
    <script>

        function select(name,id){
            $('#selected').text(name);  
            $('#selectedd').text("");
            // console.log(id);
            $("#place").val(id);
            $("*").removeClass("selectedd");   
            $("#date").val("");
            if($("#date").val() == ""){
                document.getElementById("button").disabled = true;
            }
        }
        function selectt(day,mark,placeI,placeN){
            // console.log(mark);
            // console.log(placeN);
            if(mark !=="✕"){
                if($('.selected').id != placeI){
                    $("*").removeClass("selected");
                    $('#' + placeI).addClass("selected");
                   
                }
                $('#selectedd').text(day);
                $('#selected').text(placeN); 
                $('#date').val(day);
                $("#place").val(placeI);
                
                //どちらも選択されたら
                if(($('#selected').text() != "") && ($('#selected').text() != "")){
                    // console.log("tuua");
                    document.getElementById("button").disabled = false;
                }
            } else {
                alert(placeN + "の" + day +"は空きがありません！");
                // $('#selectedd').text("");
            }
           
        }

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
                
               
                $(this).siblings().addClass("open");
                $(this).siblings().toggle();
                
            });


            $('.res').click(function () {
                if(this.id !== "✕"){    
                    $("*").removeClass("selectedd");            
                    $(this).addClass("selectedd");
                }
            });
        // });
        });

        
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
   <div id="sub">
        <div class="Ssize">
        予約したい場所をクリックすることで、その場所の日毎の空き状況を確認できます。<br>
        ○：余裕あり　△:予約残少　✕:空き無し<br>
        予約したい場所、日付が決定したら「決定」ボタンを押してください。<br>
        </div>
        <div class="th">今選択している病院:<span id="selected"></span></div>
        <div class="th">今選択している日付:<span id="selectedd"></span></div>
        
        <form action = "/selectTime" method="post">
            <input type="hidden" id="date" name="date" value="value">
            <input type="hidden" id="place" name="place" value="val">
                @csrf
            <button type="submit" id="button" class="buttoncss" disabled>決定</button>
        </form>
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
                <tr class="sub-menu" id="{{ $place->place_id }}" onclick="select('{{ $place->place_name }}','{{ $place->place_id }}')">
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->address }}</td>
                    <td>▽</td>
                    <tr class="sub-menu-nav not-active" id="">
                        <td class="th">日付</td>
                        <td class="th">空き状況</td>
                    <td></td>
                    @foreach($resdatas as  $resdata)
                        {{-- @if($resdata->year ==  2022 && $resdata->month == 03) --}}   
                        <!-- <tr> -->
                        @foreach( $resdata as $res)
                        @if($res->place_id == $place->place_id)
                        <tr class="sub-menu-nav res not-active" id="{{ $res->mark }}" onclick="selectt('{{ $res->reservation_date }}','{{ $res->mark }}','{{$res->place_id}}','{{$place->place_name}}')">
                                <!-- <td colspan="2"> -->
                                <div>
                                    
                                     <td>{{ $res->reservation_date }}</td>   
                                     <td>{{ $res->mark }}</td> 
                                     <td>{{ $res->place_id}}</td>
                                     <!-- <td>選択</td>   -->
                                </div>
                                <!-- </td> -->
                        </tr>
                        @endif
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
                ログインをすれば現在の予約を見ることができます。<br>
                <div class="th"><br>
                    ログインは<a href="/login">こちら</a>
                </div>
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
