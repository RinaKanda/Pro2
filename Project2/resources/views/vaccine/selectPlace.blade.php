<!-- 会場選択 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style>
    body{
        margin-right: auto;
        margin-left: auto;
        width: 400px;
    }
</style>
<!-- <script src="resources/js/jquery/jquey-2.1.3.js"></script> -->
<script>
    var key01 = null;
        function ok(key){
            console.log("ok:key" + key);
            var key01 = key;
            console.log(key01);
            $(function(){
                $("#place").val(key01);
            })
            // var value = $('input[value="value"]').attr('value', key01);
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
<table class="table text-center">
            <tr>
                <th class="text-center">病院名</th> 
                <th class="text-center">住所</th> 
            </tr> 
            <tr>
            <!-- <td>{{ $clinics ?? '病院が見つからないよ！' }}</td> -->
            @foreach($clinics as $key => $clinic)
                <tr class="colums" onclick="ok({{ $clinic->clinic_id }})">
                    <td>{{ $clinic->clinic_name }}</td>
                    <td>{{ $clinic->address }}</td>
                </tr>
            @endforeach
</tr>   
</table>
<form action="/selectDay/{key01}" method="post">
	<input type="hidden" id="place" name="place" value="value">
    @csrf
    <input type="submit">
</form>
<!-- <a href='/selectDay/{key01}'><button class="button">送信</button></a> -->


</body>
</html>

