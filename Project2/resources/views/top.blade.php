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
            <input type="hidden" name="from" value="top">
            @csrf
            <button type="submit">新規登録</button>
        </form>
    </div>
        <div class="border">
        <form action="/newReserve" method="post">
            @csrf
            <input type="hidden" name="obje" value="new">
            <button type="submit">新規予約</button><br>
        </form>
        </div>
        <div class="border">
        <form action="/login" method="post">
            @csrf
            <input type="hidden" name="obje" value="conf">
            <button type="submit">予約を確認・変更</button>
        </form>
        </div>
</body>   
