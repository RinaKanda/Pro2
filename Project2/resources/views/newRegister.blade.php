<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/css/validationEngine.jquery.css" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.pwdMeasure.min.js"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/all.js"></script>

    <script>
        jQuery(document).ready(function(){
        jQuery("#regiForm").validationEngine();
        });

	    $(function(){
			$("#number").change(function(){
				var str = $(this).val();
				str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
					return String.fromCharCode(s.charCodeAt(0) - 65248);
			    });
				$(this).val(str);
			}).change();
	    });

        $(function () {
			$('#passwd').pwdMeasure();
		});
    </script>

    <style>
        body{
            margin-right: auto;
            margin-left: auto;
            width: 600px;
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

        .pm-indicator {
            width: 220px;
            height: 10px;
            margin:5px 0;
            padding:1.1em 1em;
            color:#2c3e50;
            font-size:12px;
            text-align:center;
            border:1px solid #ccc;
            border-radius:2px;
            background:#e4e4e4;
            text-shadow:1px 1px 0 rgba(255,255,255,.8);
            -webkit-transition:all .2s ease-in-out;
            transition:all .2s ease-in-out;
        }
  
        .pm-indicator.very-weak,
        .pm-indicator.not-match {
            border-color:#be1d30;
            background-color:#ffc3cf;
        }
  
        .pm-indicator.weak {
            border-color:#ff787d;
            background-color:#ffe6e5;
        }
  
        .pm-indicator.strong {
            border-color:#78bc42;
            background-color:#bceea6;
        }
  
        .pm-indicator.very-strong {
            border-color:#4f85a7;
            background-color:#68c6d7;
        }
        select{
            width: 100px;
        }        
    </style>
</head>
<body>
    <title>新規登録</title>
    <h1>新規登録</h1>

    <form action="/register" method="post" id="regiForm">
        <h3>name<span class="red">※</div></h3>
        <input type="text" value="佐々木" name="familyname" placeholder="姓" class=validate[required]> <input type="text" value="太郎" name="firstname" placeholder="名前" class="validate[required]">
        
        <h3>接種券番号</h3>
        <input type="text" name="number" value="0003843293" placeholder="10桁の接種券番号を入力" id="number" class=validate[required,custom[number],minSize[10],maxSize[10]]]>

        <h3>生年月日</h3>
        <select id="year" name="yaer" class=validate[required]>
            <option value="" class=validate[required]>----</option>
        </select> 年
        <select id="month" name="month" class=validate[required]>
            <option value="" class=validate[required]>--</option>
        </select> 月
        <select id="date" name="date" class=validate[required]>
            <option value="" class=validate[required]>--</option>
        </select> 日

        <!-- <h3>生年月日</h3>
        <input type="text" pattern="^[0-9]{4}" id="year" name="yaer" value="1980" class=validate[required]>年<input type="text" pattern="[0-9]{2}" id="month" name="month" value="09" class=validate[required]>月<input type="text" pattern="[0-9]{2}" id="date" name="date" value="03" required>日 -->
        
        <h3>メールアドレス</h3>
        <input type="text" name="mailad" value="abc@gmail.com" placeholder="メールアドレス" class="validate[required,custom[email]]">
        
        <h3>パスワード</h3>
        <div class="col-sm-8">
			<input type="password" name="password" value="abcd" placeholder="パスワード" id="passwd" class=validate[required]>
		</div>
        <div id="pm-indicator" class="pm-indicator"></div>
        <!-- <input type="text" name="password" value="abcd" placeholder="パスワード" id="passwd"> -->
        
        <h3>パスワード(二回目)</h3>
        <input type="text"  name="password" value="abcd" placeholder="パスワード(二回目)" class=validate[required]>
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
