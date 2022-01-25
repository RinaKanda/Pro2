<!-- <!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>時間選択</title>-->
    <script>
        function select(res){
            var keydid = res;
            $(function(){
                $("#Did").val(keydid);
            })
        }
        $(function(){
            // var keyid = '{{--{{$resPid}}--}}';
            // $("#Pid").val(keyid);
            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
                document.getElementById("button").disabled = false;
            });
        });
    </script>
    <!--
</head>
<body> -->
@extends('layouts.reserlay')
@section('content')
        <div id="sub">
            <div class="Ssize">
            予約したい場所をクリックすることで、その場所の日毎の空き状況を確認できます。<br>
            ○：余裕あり　△:予約残少　✕:空き無し<br>
            予約したい場所、日付が決定したら「決定」ボタンを押してください。<br>
            </div>
            @foreach($place as $place)
            <div class="th">今選択している病院:<span id="selectedd">{{ $place->place_name }}</span></div>
            @endforeach
        <div class="th" >今選択している日付:<span id="selectedd">{{ $date }}</span></div>
        <div class="th">今選択している時間:<span id="selected"></span></div>
        
        <form action = "/selectTime" method="post">
            <input type="hidden" id="date" name="date" value="value">
            <input type="hidden" id="place" name="place" value="val">
            <input type="hidden" id="time" name="time" value="val">
                @csrf
            <button type="submit" id="button" class="buttoncss" disabled>決定</button>
        </form>
   </div>

    <div class="wrapper">
        <main>
         

        <!--
            <h2>選択している日付:{{ $date }}</h2> -->
        <table class="table text-center">
            <tr>
                <th class="text-center">時間</th> 
                <th class="text-center">残り人数</th> 
            </tr> 
            
            @foreach($resdatas as $resdata)
                <tr class="colums" onclick="select({{ $resdata->reservation_data_id }})">
                    <td>{{ $resdata->reservation_time }}</td>
                    <td>{{ $resdata->reserve_avail }}</td>
                </tr>
            @endforeach
</tr>   
</table>
<form action="/reserveConfirm" method="post">
    <input type="hidden" id="Did" name="Did" value="value">
    <input type="hidden" id="Pid" name="Pid" value="value">
    @csrf
    <button type="submit" id="button" disabled>送信</button>
</form>
@endsection    
<!-- </body>
</html> -->
