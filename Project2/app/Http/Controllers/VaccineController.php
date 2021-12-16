<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Model
use App\Models\place;

use App\Models\reservation_data;
use App\Models\reserve_person;
use Illuminate\Support\Facades\DB;


//入れる配列

class VaccineController extends Controller

{
    
    //新規登録
    public function register(Request $request){
        $return  = $request->input('val');

        $familyNM  = $request->input('familyname');
        $firstNM  = $request->input('firstname');
        $num  = $request->input('number');
        $yaer  = $request->input('yaer');
        $month  = $request->input('month');
        $date  = $request->input('date');
        $mail  = $request->input('mailad');
        $pass  = $request->input('password');
        $rowCount = reserve_person::count();

        DB::table('reserve_people')->insert([
            'Reserve_person_id' => $rowCount+1,
            'tickets_number' => $num,
            'birthday' => $yaer.'-'.$month.'-'.$date,
            'pass' => $pass,
            'email' => $mail,
            'family_name' => $familyNM,
            'firsta_name' => $firstNM
        ]);

        if($return == "top"){
            return view('top');
        } else {
            return view("newReserve");
        } 
    }
    //新規予約画面へ
    public function newRegister(Request $request){
        $keyReg = $request->input('val');
        return view('/newRegister', compact('keyReg'));
    }

    //DBに入力されたデータがあるかチェック
    public function checkuser(Request $request){
        //認証成功したらcheck変数をtrueに


        $check = false;

        //認証
        $Vnum = $request->input('vaccination_num');
        $year = $request->input('year');
        $month = $request->input('month');
        $date = $request->input('date');
        $ymd = $year.'-'.$month.'-'.$date;

        $item = reserve_person::where('tickets_number',$Vnum)->where('birthday',$ymd)->first();

        if($item != null){
            $check = true;
            $resePid = $item['Reserve_person_id'];
        }


        if($check){
            $places = place::all();
            return view('vaccine/selectPlace',compact('places',$resePid));
        } else {
            return view("newReserve",compact("misscheck"));
        }
    } 

    //場所選択
    public function place(Request $request){    
        $places = place::all();
        return view('vaccine/selectPlace',compact('places'));
    }

    //日選択
    public function day(Request $request){
        $key = $request->input('place');
        
        $resdatas = reservation_data::where('place_id',$key)->get();
        $place = place::select('place_name')->where('place_id',$key)->get();
        
        // $capkey = array();
        $resdatas = reservation_data::select('reservation_date')->where('place_id',$key)->distinct()->get();
        $keynum = 0;
        foreach($resdatas as $value){
            //placeid
            $resdatas[$keynum]['place_id'] = $key;
            //日付データ関連
            $resdatas[$keynum]['year'] =  date('Y', strtotime($resdatas[$keynum]['reservation_date']));
            $resdatas[$keynum]['month'] =  date('m', strtotime($resdatas[$keynum]['reservation_date']));
            //キャパ計算
            $cap = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('capacity');
            $resdatas[$keynum]['capacity'] = $cap ;
            //予約可能人数計算
            $Reserved = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('reserve_counts');
            $resdatas[$keynum]['reserve_avail'] = $cap - $Reserved ;
            //割合
            $resdatas[$keynum]['ratio'] = $Reserved / $cap ;
            //予約6割以上で△
            if($resdatas[$keynum]['ratio'] == 1){
                $resdatas[$keynum]['mark'] = "✕";
            } else if($resdatas[$keynum]['ratio'] >= 0.6){
                $resdatas[$keynum]['mark'] = "△";
            } else {
                $resdatas[$keynum]['mark'] = '○';
            }
            $keynum++;
             
        }
        return view('vaccine/selectDay',compact('resdatas','place'));
    }

    //時間選択
    public function Time(Request $request){
        $key = $request->input('place');
        $keyday=$request->input('date');
        $resdatas = reservation_data::where('reservation_date',$keyday)->where('place_id',$key)->get();
        $keynum = 0;
        foreach($resdatas as $value){
            //placeid
            $resdatas[$keynum]['place_id'] = $key;
            //date
            $resdatas[$keynum]['reservation_date'] = $keyday;
            
            //キャパ計算
            $cap = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('capacity');

            $resdatas[$keynum]['capacity'] = $cap ;
            //予約可能人数計算
            $Reserved = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('reserve_counts');
            $resdatas[$keynum]['reserve_avail'] = $cap - $Reserved ;
            $keynum++;   
        }
        $place = place::select('place_name')->where('place_id',$key)->get();
        $date =   $keyday;     
        return view('vaccine/selectTime',compact('resdatas','place','date'));
    }

    public function confirm(){
        return view('reserveConfirm');
    }

    // //view共通
    public function boot(){
        
    }
}
