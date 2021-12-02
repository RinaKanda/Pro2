<!-- 日時選択 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    var key01 = null;
        function ok(day){
            console.log("day:" + day);
            var day01 = day;
            console.log(day01);
        }
        $(function(){
            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
        
</script>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
            @foreach($place as $key => $clinic)
                <h2>選択している病院:{{ $clinic->clinic_name }}</h2>
            @endforeach
<table class="table text-center">
            <tr>
                <th class="text-center">日付</th> 
            </tr> 
            
            @foreach($vacdatas as $key => $vacdata)
                <tr class="colums" onclick="ok({{ $vacdata->vaccination_date }})">
                    <td>{{ $vacdata->vaccination_date }}</td>
                </tr>
            @endforeach
</tr>   
</table>       
<a href="/selectTime">選択</a>
</body>
</html>