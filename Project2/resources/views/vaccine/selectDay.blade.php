<!-- 日時選択 -->
<?php
echo "日選択";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table class="table text-center">
            <tr>
                <th class="text-center">病院名</th> 
                <th class="text-center">日付</th> 
            </tr> 
            <tr>
            
            @foreach($vacdatas as $key => $vacdata)
                <tr>
                    <td>{{ $vacdata->clinic_id }}</td>
                    <td>{{ $vacdata->vaccination_date }}</td>
                </tr>
            @endforeach
</tr>   
</table>       
<a href="/selectTime">選択</a>
</body>
</html>