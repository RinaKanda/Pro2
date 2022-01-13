<!DOCTYPE html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="/css/all.css"> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        /* body{
            margin-right: auto;
            margin-left: auto;
            width: 400px;
        } */
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
        .menu {
            display: block;
            position: relative;
            width: 1.75rem;
            height: 1.5rem;
        }
        .open-menu {
            width: 50%;   
        }
        nav{
            position: fixed;
            overflow: hidden;
            top: 0;
            bottom: 0;
            right: 0;
            text-align: center;
            width: 0; 
            transition: 0.2s;
        }
        nav ul {
            padding: 50px 20px;
        }
        nav li {
            list-style: none;
            text-align: left;
            padding: 10px 0;
        }
        .radio-menu{
            /* display: none; */
            position: absolute;
            list-style: none;
            margin: 0;
            padding: 0;
            background-color:grey;
        }

        .radio-menu li{
            padding: 5px;
        }
        .open {
        width: 100%;
        height: 100%;
        }

    /* new */
    .wrapper {
        height: 100%;
        overflow-x: hidden;
        position: relative;
        }
        .overlay {
        content: "";
        display: block;
        width: 0;
        height: 0;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        opacity: 0;
        transition: opacity .5s;
        }
        .overlay.open {
        width: 100%;
        height: 100%;
        opacity: 1;
        }
        main {
        height: 100%;
        min-height: 100vh;
        padding: 0 50px;
        background-color: #eee;
        transition: all .5s;
        display: flex;
        flex-direction: column;
        justify-content: center;
        }
        main.open {
        transform: translateX(-250px);
        }
        main h1 {
        text-align: center;
        font-weight: 500;
        }
        main p {
        text-align: center;
        }
        .menu-trigger {
        display: inline-block;
        width: 36px;
        height: 28px;
        vertical-align: middle;
        cursor: pointer;
        position: fixed;
        top: 30px;
        right: 30px;
        z-index: 100;
        
        transform: translateX(0);
        /*transition: transform .5s;
        */}
        .menu-trigger.active {
        transform: translateX(-250px);
        }
       .menu-trigger span {
        display: inline-block;
        box-sizing: border-box;
        position: absolute;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #000;
        transition: all .5s;
        }
        .menu-trigger.active span {
        background-color: #fff;
        }
        .menu-trigger span:nth-of-type(1) {
        top: 0;
        }
        .menu-trigger.active span:nth-of-type(1) {
        transform: translateY(12px) rotate(-45deg);
        }
        .menu-trigger span:nth-of-type(2) {
        top: 12px;
        }
        .menu-trigger.active span:nth-of-type(2) {
        opacity: 0;
        }
        .menu-trigger span:nth-of-type(3) {
        bottom: 0;
        }
        .menu-trigger.active span:nth-of-type(3) {
        transform: translateY(-12px) rotate(45deg);
        }

        nav {
        width: 250px;
        height: 100%;
        padding-top: 100px;
        background-color: rgb(16, 69, 153, 0.8);
        position: fixed;
        top: 0;
        right: 0;
        z-index: 10;
        transform: translate(250px);
        transition: all .5s;
        }
        nav.open {
        transform: translateZ(0);
        }
        nav li {
        color: #fff;
        text-align: center;
        padding: 10px 0;
        }
    </style>
    <script>
        $(function(){
    //         $('.nav').hide();
    //         $('.menu').on('click',function(){
    //             $('.nav').toggle();
    //         })        
    //     var menu = document.getElementById("menu");
    //     const back = document.getElementById("back");
    //     const nav = document.getElementById("nav");
    //     console.log(menu,back,nav);

    //     menu.addEventListener("click", () => {
    //     if (nav.className === "navi") {
    //         nav.classList.add("open-menu");
    //         back.classList.add("open");
    //         menu.textContent = "閉じる";
    //     }else {nav.classList.remove("open-menu");
    //         back.classList.remove("open");
    //             menu.textContent = "menu";
    //         }
    //     });
        
    //     back.addEventListener("click", () => {
    //         back.classList.remove("open");
    //         nav.classList.remove("open-menu");
    //         menu.textContent = "menu";
    //     });
    // });

    $('.menu-trigger').on('click',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('main').removeClass('open');
            $('nav').removeClass('open');
            $('.overlay').removeClass('open');
        } else {
            $(this).addClass('active');
            $('main').addClass('open');
            $('nav').addClass('open');
            $('.overlay').addClass('open');
        }
    });
$('.overlay').on('click',function(){
  if($(this).hasClass('open')){
    $(this).removeClass('open');
    $('.menu-trigger').removeClass('active');
    $('main').removeClass('open');
    $('nav').removeClass('open');      
  }
});
        });
    </script>
</head>

<body>
    <title>〇〇市ワクチン予約サイト</title>
    <h1>〇〇市ワクチン予約サイト</h1>
    <!-- <div>
        <p id="menu">
            AA
        </p>
        <nav id="nav">
            <ul class="radio-menu" id="rmenu">
                AAA様
                <li><a href="#">予約データa</a></li>
                <li><a href="#">予約データb</a></li>
                <li><a href="#">予約データc</a></li>
            </ul>
        </nav>
    </div>
    <div id="back" class="menu-background"></div> -->

    <div class="wrapper">
        <div class="menu-trigger" href="">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav>
            <ul>
            <li>MENU</li>
            <li>MENU</li>
            <li>MENU</li>
            </ul>
        </nav>
        <div class="overlay"></div>
    </div>

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
