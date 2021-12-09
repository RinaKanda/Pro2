<!-- 日時選択 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script>
    var key01 = null;
    var day = "1";
        function select(day,pla){
            console.log("day:" + day);
            var day01 = day;
            console.log("place:" + pla);
            var placekey = pla;
            $(function(){
                $("#date").val(day01);
                $("#place").val(placekey);
            })
        }
        $(function(){
            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
        $(function() {
            $( "#datepicker" ).datepicker();
        });
</script>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        }
    </style>
</head>
<body>
            @foreach($place as $key => $place)
                <h2>選択している病院:{{ $place->place_name }}</h2>
            @endforeach
<table class="table text-center">
            <tr>
                <th class="text-center">日付</th> 
            </tr> 
            <input type="date" value="val">
            @foreach($resdatas as  $resdata)
                <tr class="colums" onclick="select('{{ $resdata->reservation_date }}' ,{{ $resdata->place_id }})">
                    <td>{{ $resdata->reservation_date }}</td>

                </tr>
            @endforeach
</tr>   
</table>       
<form action="/selectTime" method="post">
    <input type="hidden" id="date" name="date" value="value">
    <input type="hidden" id="place" name="place" value="val">
        @csrf
    <button type="submit">送信</button>
</form>
<a href="/selectTime">選択</a>

<div id="datepicker"></div>
</body>
</html>