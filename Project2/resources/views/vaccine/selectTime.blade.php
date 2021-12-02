<!-- 日付選択 -->
時間選択
<!DOCTYPE html>
<html lang="ja">
<head>
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
<table class="table text-center">
            <tr>
                <th class="text-center">病院名</th> 
                <th class="text-center">時間</th> 
            </tr> 
            <tr>
            
            @foreach($vacdatas as $key => $vacdata)
                <div onclick="ok">
                <tr>
                    <td>{{ $vacdata->clinic_id }}</td>
                    <td>{{ $vacdata->vaccination_time }}</td>
                </tr>
                </div>
            @endforeach
</tr>   
</table>       
<a href="/reserveConfirm">選ぶ</a>
</body>
</html>
