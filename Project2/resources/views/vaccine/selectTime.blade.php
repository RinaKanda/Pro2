<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Document</title>
    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        }

    </style>
    <script>
        function select(day){
            console.log("day:" + day);
            var day01 = day;
            console.log(day01);
            $(function(){
                $("#time").val(day01);
            })
        }
        $(function(){
            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
</head>
<body>
        @foreach($place as $place)
            <h2>選択している病院:{{ $place->place_name }}</h2>
        @endforeach

        
            <h2>選択している日付:{{ $date }}</h2>
        <table class="table text-center">
            <tr>
                <th class="text-center">時間</th> 
                <th class="text-center">日</th>  
                <th class="text-center">人数</th> 
            </tr> 
            
            @foreach($resdatas as $resdata)
                <tr class="colums" onclick="select({{ $resdata->reservation_data_id }})">
                    <td>{{ $resdata->reservation_time }}</td>
                    <td>{{ $resdata->reservation_date }}</td>
                    <td>{{ $resdata->reserve_avail }}</td>
                </tr>
            @endforeach
</tr>   
</table>
<form action="/reserveConfirm" method="post">
    <input type="hidden" id="time" name="time" value="value">
    @csrf
    <button type="submit">送信</button>
</form>    
<a href="/reserveConfirm">選ぶ</a>
</body>
</html>
