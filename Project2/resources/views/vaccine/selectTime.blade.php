<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>時間選択</title>
    <script>
        function select(res){
            var keydid = res;
            $(function(){
                $("#Did").val(keydid);
            })
        }
        $(function(){
            var keyid = '{{$resPid}}';
            $("#Pid").val(keyid);
            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
                document.getElementById("button").disabled = false;
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
</body>
</html>
