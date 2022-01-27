<!-- 予約確認 -->

<!-- <!DOCTYPE html>
<html lang="ja">
<head> -->
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>予約確認画面</title>
    <style>
        .wrapper {
            height:auto;
            width: 80%;
            /* weight:800px; */
            /* overflow-x: hidden; */

            /* overflow:scroll; */
            /* position: relative; */
            position:fixed;
            left:30%;
            margin-top:20px;
            /* top:250px; */
            /* margin-bottom:50px; */
            }
            .space{
                margin:10px;
            }
            .tred{
                /* background-color:white; */
                color:red;
                display: inline-block;
            }
            .buttonconf{
                font-weight:bold;
                text-align:right;
                font-size:20px;
            }
        /* body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        } 
        .btn{
            /* 一旦リセット 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* border: 0;
            border-radius: 0; 
            margin: 5px;
            background-color:lightgrey;
            color:black;
            font-size:13px;
        }
        .inlineSet{
            display:inline-flex;
        }*/
    </style>
    <script>
        $(function(){
            var keypl = '{{$placeid}}'
            var keydate = '{{$date}}'
            var keydid = '{{$keyDid}}';
            // var keyid = '{{-- {{$keyPid}} --}}';
            $("#Did").val(keydid);
            // $(".Pid").val(keyid);
            $("#place").val(keypl);
            $('#date').val(keydate);

            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
<!-- </head>
<body> -->
    <!-- <dialog open>
        <p>Greetings, one and all!</p>
        <button>OK</button>
    </dialog> -->
    @extends('layouts.reserlay')
    @section('content')
    <div id="sub">
            <div class="Ssize">
            予約内容に間違いがないことを確認してください。<br>
            間違いがなければ<span class="th">「予約する」</span>をクリックしてください。 <br>
            変更したい箇所がある場合、その項目の隣にある  <span class="th">「変更する」</span>ボタンを押してください。
            @guest
            <span class="tred">予約するためにはログインが必要です。 ログインしてください</span>
            @endguest
            </div>        
   </div>
    <div class="wrapper">
        <main>
        <!-- <h2>予約確認画面</h2> -->
        <div >
            
            <form method="post">
                <div class="space">
                    @auth
                    <span class="th">接種券番号:{{ $auths->tickets_number }} 
                        <!-- <input type="hidden" class="Pid" name="Pid" value="value"> -->
                    </span>
                    @endauth
                   
                </div>
                @guest
                <div class="overlay">
                @endguest

                <div class="space">
                   
                    <span class="th">選択している病院:{{ $place }}
                        <span class="inlineSet">
                            <input type="hidden" name="keyreg" value="change">
                            <button formaction="/" type="submit" class="btn">変更する</button>
                        </span>
                    </span>
                    <h5>※接種場所を変更すると、日時も選択していただくことになります。</h5>
                </div>
                <div class="space">
                    <span class="th">選択している日:{{ $date }}  
                        <span class="inlineSet">
                            <input type="hidden" id="place" name="place" value="value">
                            <button formaction="/" type="submit" class="btn">変更する</button>
                        </span>
                    </span>
                    <h5>※時間も選択していただくことになります。</h5>
                </div>
                <div class="space">
                    <span class="th">選択している時間:{{ $time }} 
                        <span class="inlineSet">
                            <input type="hidden" id="date" name="date" value="value">
                            <button formaction="/selectTime" type="submit" class="btn">変更する</a>
                        </span>
                    </span>
                </div>
                @csrf
                <input type="hidden" id="Did" name="Did" value="value">
                <input type="hidden" class="Pid" name="Pid" value="value">
                @csrf
                @auth
                <button formaction="/top" type="submit" id="button" class="buttoncss">予約する</button>
                @endauth
                @guest
                </div>
                <span> 
                    <span class="tred">予約するためにはログインが必要です。<button formaction="/resRegister" type="submit" id="button" class="buttonconf" disabled>予約する</button></span>
                    <br>ログインは<a href="/login">こちら</a>
                </span> 
                @endguest
            </form>    
        </div>
        </main>
    @endsection    
<!-- </body>
</html> -->
