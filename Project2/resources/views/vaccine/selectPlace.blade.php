<!-- 会場選択 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
        function ok(key){
            alert("ok:key" + key);
            
        }
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
                <tr onclick="ok({{ $clinic->clinic_id }})">
                    <td>{{ $clinic->clinic_name }}</td>
                    <td>{{ $clinic->address }}</td>
                </tr>
            @endforeach
</tr>   
</table>       
<a href="/selectDay">送信</a>
</body>
</html>
