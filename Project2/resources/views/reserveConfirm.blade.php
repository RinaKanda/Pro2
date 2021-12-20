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
        .btn{
            /* 一旦リセット */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* border: 0;
            border-radius: 0; */
            margin: 5px;
            background-color:lightgrey;
            color:black;
            font-size:13px;
        }
        .inlineSet{
            display:inline-flex;
        }
    </style>
    <script>
        $(function(){
            var keypl = '{{$placeid}}'
            var keydate = '{{$date}}'
            var keydid = '{{$keyDid}}';
            var keyid = '{{$keyPid}}';
            $("#Did").val(keydid);
            $("#Pid").val(keyid);
            $("#place").val(keypl);
            $('#date').val(keydate);

            $('.colums').click(function(){
                $("*").removeClass("selected");
                $(this).addClass("selected");
            });
        });
    </script>
</head>
<body>
    <!-- <dialog open>
        <p>Greetings, one and all!</p>
        <button>OK</button>
    </dialog> -->
    <h2>予約確認画面</h2>
    <div>
        <form method="post">
            <div>
                <h3>接種券番号:{{ $Tnum }}
                    <!-- <input type="hidden" id="Pid" name="Pid" value="value"> -->
                </h3>
            </div>
            <div>
                <h3>選択している病院:{{ $place }}
                    <div class="inlineSet">
                        <button formaction="/selectPlace" type="submit" class="btn">変更する</button>
                    </div>
                </h3>
                <h5>※接種場所を変更すると、日時も選択していただくことになります。</h5>
            </div>
            <div>
                <h3>選択している日:{{ $date }}  
                    <div class="inlineSet">
                        <input type="hidden" id="place" name="place" value="value">
                        <button formaction="/selectDay" type="submit" class="btn">変更する</button>
                    </div>
                </h3>
                <h5>※時間も選択していただくことになります。</h5>
            </div>
            <div>
                <h3>選択している時間:{{ $time }} 
                    <div class="inlineSet">
                        <input type="hidden" id="date" name="date" value="value">
                        <button formaction="/selectTime" type="submit" class="btn">変更する</a>
                    </div>
                </h3>
            </div>
            @csrf
            <input type="hidden" id="Did" name="Did" value="value">
            <input type="hidden" id="Pid" name="Pid" value="value">
            @csrf
            <button formaction="/resRegister" type="submit">予約する</button>
        </form>    
    </div>
</body>
</html>
