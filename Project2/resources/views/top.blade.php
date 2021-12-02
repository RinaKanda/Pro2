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
        button {
            background: none;
            border: none;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body>
    <title>〇〇市ワクチン予約サイト</title>
    <h1>〇〇市ワクチン予約サイト</h1>
    <div class="border">
        <form action="/newRegister" method="post">
            <input type="hidden" name="val" value="top">
            @csrf
            <button type="submit">新規登録</button>
        </form>
    </div>
        <!-- <a href="/newRegister">新規登録</a> -->
    <div class="border">
        <a href="/newReserve">新規予約</a><br>
    </div>
    <div class="border">
        <a href="/login">予約を確認・変更</a>
    </div>
</body>   
