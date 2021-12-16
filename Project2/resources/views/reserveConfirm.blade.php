<!-- 予約確認 -->


<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" type="text/css" href="/css/all.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>予約確認画面</title>
    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        }
        a.btn{
            background-color:orange;
            color:white;
            font-size:13px;
        }
    </style>
    <script>
        function select(res,id){
            var keydid = res;
            var keyid = id;
            console.log(keydid + "+" + keyid);
                $("#Did").val(keydid);
                $("#Pid").val(keyid);
        }
        $(function(){
            var keydid = '{{$keyDid}}';
            var keyid = '{{$keyPid}}';
            $("#Did").val(keydid);
            $("#Pid").val(keyid);

            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
</head>
<body>
    <h2>予約確認画面</h2>
    <div>
        <div>
            <h3>接種券番号:{{ $Tnum }}  </h3>
        </div>
        <div>
            <h3>選択している病院:{{ $place }}  <a href="" class="btn">変更する</a></h3>
                <h5>※接種場所を変更すると、日時も選択していただくことになります。</h5>
        </div>
        <div>
            <h3>選択している日:{{ $date }}  <a href="" class="btn">変更する</a></h3>
                <h5>※時間も選択していただくことになります。</h5>
        </div>
        <div>
            <h3>選択している時間:{{ $time }}  <a href="" class="btn">変更する</a></h3>
        </div>

    </div>
<form action="/resRegister" method="post">
    <input type="hidden" id="Did" name="Did" value="value">
    <input type="hidden" id="Pid" name="Pid" value="value">
    @csrf
    <button type="submit">予約する</button>
</form>    
</body>
</html>
