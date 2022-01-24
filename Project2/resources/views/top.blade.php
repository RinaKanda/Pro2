@extends('layouts.reserlay')
@section('content')
   <div id="sub">
        <div class="Ssize">
        予約したい場所をクリックすることで、その場所の日毎の空き状況を確認できます。<br>
        ○：余裕あり　△:予約残少　✕:空き無し<br>
        予約したい場所、日付が決定したら「決定」ボタンを押してください。<br>
        </div>
        <div class="th">今選択している病院:<span id="selected"></span></div>
        <div class="th">今選択している日付:<span id="selectedd"></span></div>
        
        <form action = "/selectTime" method="post">
            <input type="hidden" id="date" name="date" value="value">
            <input type="hidden" id="place" name="place" value="val">
                @csrf
            <button type="submit" id="button" class="buttoncss" disabled>決定</button>
        </form>
   </div>

    <div class="wrapper">
        <main>
        <table class="table">
            <tr>
                <th>病院名</th> 
                <th>住所</th>
                <!-- <th>日付</th>  -->
            </tr> 
            <tr>
            <nav id="global-nav">
            @foreach($places as $key => $place)
            <tbody>
                <tr class="sub-menu" id="{{ $place->place_id }}" onclick="select('{{ $place->place_name }}','{{ $place->place_id }}')">
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->address }}</td>
                    <td>▽</td>
                    <tr class="sub-menu-nav not-active" id="">
                        <td class="th">日付</td>
                        <td class="th">空き状況</td>
                    <td></td>
                    @foreach($resdatas as  $resdata)
                        {{-- @if($resdata->year ==  2022 && $resdata->month == 03) --}}   
                        <!-- <tr> -->
                        @foreach( $resdata as $res)
                        @if($res->place_id == $place->place_id)
                        <tr class="sub-menu-nav res not-active" id="{{ $res->mark }}" onclick="selectt('{{ $res->reservation_date }}','{{ $res->mark }}','{{$res->place_id}}','{{$place->place_name}}')">
                                <!-- <td colspan="2"> -->
                                <div>
                                    
                                     <td>{{ $res->reservation_date }}</td>   
                                     <td>{{ $res->mark }}</td> 
                                     <td>{{ $res->place_id}}</td>
                                     <!-- <td>選択</td>   -->
                                </div>
                                <!-- </td> -->
                        </tr>
                        @endif
                            @endforeach
                        {{-- @endif --}}
                        <!-- </tr> -->
                    @endforeach
    </tr>
                </tr>
            </tbody>
            @endforeach
            </tr>   

        </table>
            
         </main>
@endsection