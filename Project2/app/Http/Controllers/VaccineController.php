<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
//use Model
use App\Models\place;

use App\Models\reservation_data;
use App\Models\reserve_person;
use Illuminate\Support\Facades\DB;



class VaccineController extends Controller

{
    //新規登録
    public function register(Request $request){
        $return  = $request->input('from');

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
            return view("login");
        } 
    }
    //ログイン
    public function login(Request $request){
        $keyReg = $request->input('obje');
        echo $keyReg;
        return view('/login', compact('keyReg'));
    }
    //新規予約画面へ
    public function newRegister(Request $request){
        $keyReg = $request->input('from');
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
            $resPid = $item['Reserve_person_id'];
        }
        $misscheck ="oo";

        if($check){
            $places = place::all();

            return view('vaccine/selectPlace',compact('places','resPid'));
        } else {
            return view("newReserve",compact("misscheck"));
        }
    } 

    //場所選択
    public function place(Request $request){    
        $places = place::all();
        $resPid = 2;
        return view('vaccine/selectPlace',compact('places','resPid'));
    }

    //日選択
    public function day(Request $request){
        $key = $request->input('place');
        //渡す値
        $resPid = $request->input('Pid');
        // $resdatas = reservation_data::where('place_id',$key)->get();
        $place = place::select('place_name')->where('place_id',$key)->get();
        //現在日時
        $now = new Carbon('today');
        $resdatas = reservation_data::select('reservation_date')->where('place_id',$key)->whereDate('reservation_date',">=",$now)->distinct()->get();
        
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
            $cancel = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('cancel');
            $resdatas[$keynum]['reserve_avail'] = $cap - $Reserved + $cancel;
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
        return view('vaccine/selectDay',compact('resdatas','place','resPid'));
    }

    //時間選択
    public function Time(Request $request){
        $key = $request->input('place');
        $keyday=$request->input('date');
        //渡す用
        $place = place::select('place_name')->where('place_id',$key)->get();
        $date =   $keyday; 
        $resdatas = reservation_data::where('reservation_date',$keyday)->where('place_id',$key)->get();
        $resPid = $request->input('Pid');
        //time
        $now = new Carbon('now');
        if($keyday == $now){
            $resdatas[$keynum]['reservation_time'] = reservation_data::where('reservation_date',$keyday)->where('place_id',$key)->whereDate('reservation_date',">=",$now)->get();
        }

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
            $cancel = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date',$value['reservation_date'])->sum('cancel');
            $resdatas[$keynum]['reserve_avail'] = $cap - $Reserved + $cancel;
            $keynum++;   
        }    
        return view('vaccine/selectTime',compact('resdatas','place','date','resPid'));
    }

    //予約確認
    public function confirm(Request $request){
        $keyDid = $request->input('Did');
        $keyPid = $request->input('Pid');
        //チケットナンバー
        $userid = reserve_person::where('Reserve_person_id',$keyPid)->get();
        $Tnum = $userid[0]['tickets_number'];
        //日時
        $resdata = reservation_data::where('reservation_data_id',$keyDid)->get();
        $date = $resdata[0]['reservation_date'];
        $time = $resdata[0]['reservation_time'];
        //病院名
        $keypl = reservation_data::select('place_id')->where('reservation_data_id',$keyDid)->get();
        // $pl = place::where('place_id',$keypl[0]['place_id'])->get();
        $pl = place::where('place_id',$keypl[0]['place_id'])->get();
        $place = $pl[0]['place_name'];
        $placeid = $pl[0]['place_id'];
        return view('reserveConfirm',compact('keyDid','keyPid','Tnum','date','time','place','placeid'));
    }

    public function resRegister(Request $request){
        $reservation_data_id = $request->input('Did');
        $reserve_person_id = $request->input('Pid');
        return view('/reserveFinish');
    }

    // //view共通
    public function boot(){
        
    }
}
