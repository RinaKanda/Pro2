<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規予約</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 700px;
        }
    </style>
</head>
<script>
	$(function(){
			$("#vaccination_num, #year, #month, #date").change(function(){
					var str = $(this).val();
					str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
							return String.fromCharCode(s.charCodeAt(0) - 65248);
					});
					$(this).val(str);
			}).change();
	});
</script>
<body>
    <h1>新規予約</h1>
    
    <form class="checkform"  method="post" action="/selectPlace">
        <h2>接種券番号</h2>
        <input type="text" pattern="^[0-9]{10}" id="vaccination_num" required><br>
        <h2>生年月日</h2>
        <input type="text" pattern="^[0-9]{4}" id="year" required>年<input type="text" pattern="[0-9]{2}" id="month" required>月<input type="text" pattern="[0-9]{2}" id="date" required>日
        <p><input type="submit" value="送信"></p>
        <a href="/selectPlace">次へ</a>
    </form> 
</body>
</html>