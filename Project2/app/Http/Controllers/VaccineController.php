<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Model
use App\Models\place;

use App\Models\resercvation_data;
use App\Models\reserve_person;
use Illuminate\Support\Facades\DB;



//入れる配列

class VaccineController extends Controller

=======
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
    //新規予約
    public function newRegister(Request $request){
        $keyReg = $request->input('val');
        return view('/newRegister', compact('keyReg'));
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
        $a = reservation_data::select('reservation_date')->where('place_id',$key)->distinct()->get();
        echo $a[0]['reservation_date'];
        $abc = DB::table('reservation_datas')->where('place_id',$key)->where('reservation_date','2022_03_08')->sum('capacity');
        echo $abc;
        // array_push($capkey,$a);

        // print_r($capkey);
        return view('vaccine/selectDay',compact('resdatas','place'));
    }

    //時間選択
    public function Time(Request $request){
        $key = $request->input('place');
        $keyday=$request->input('date');
       
        
        
        $resdatas = reservation_data::where('reservation_date',$keyday)->get();
        $place = place::select('place_name')->where('place_id',$key)->get();        
        return view('vaccine/selectTime',compact('resdatas','place'));
    }

    public function confirm(){
        return view('reserveConfirm');
    }

    // //view共通
    public function boot(){
        
    }
}
