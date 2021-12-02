<!DOCTYPE html>
<head>
    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        }
        .border{
            border:solid 2px;
            width: 160px;
            text-align:center;
            margin-top: 50px;
            margin-right: auto;
            margin-left: auto;
        }
        .red{
            color:red;
        }
    </style>
</head>
<body>
    <title>新規登録</title>
    <h1>新規登録</h1>
    <form action="/register" method="post">
        <h3>name<span class="red">※</div></h3>
        <input type="text" value="佐々木" name="familyname" placeholder="姓"> <input type="text" value="太郎" name="firstname" placeholder="名前">
        
        <h3>接種券番号</h3>
        <input type="text" name="numbe" value="0003843293" placeholder="10桁の接種券番号を入力">
        
        <h3>生年月日</h3>
        <input type="text" pattern="^[0-9]{4}" id="year" name="yaer" value="1980" required>年<input type="text" pattern="[0-9]{2}" id="month" name="month" value="09" required>月<input type="text" pattern="[0-9]{2}" id="date" name="date" value="03" required>日
        
        <h3>メールアドレス</h3>
        <input type="text" name="mailad" value="abc@gmail.com" placeholder="メールアドレス">
        
        <h3>パスワード</h3>
        <input type="text" name="password" value="abcd" placeholder="パスワード">
        
        <h3>パスワード(二回目)</h3>
        <input type="text"  name="password" value="abcd" placeholder="パスワード(二回目)">
        <p>
            @if ($keyReg === 'top')
                top
                <input type="hidden" name="val" value="top">
            @else
                newReserve
                <input type="hidden" name="val" value="newReserve">
            @endif
        </p>
        @csrf
        <button type="submit">送信</button>
    </form>
</body>   
</html>
