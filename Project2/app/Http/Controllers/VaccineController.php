<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Model
use App\Models\place;
use App\Models\resercvation_data;


class VaccineController extends Controller
{
    //新規登録
    public function register(Request $request){
        $return  = $request->input('val');

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
        $clinics = clinic::all();
        return view('vaccine/selectPlace',compact('clinics'));
    }

    //日選択
    public function day(Request $request){
        $key = $request->input('place');
        $vacdatas = vaccination_data::where('clinic_id',$key)->get();
        $place = clinic::select('clinic_name')->where('clinic_id',$key)->get();
        
        return view('vaccine/selectDay',compact('vacdatas','place'));
    }

    //時間選択
    public function Time(){

        $vacdatas = vaccination_data::all();
        return view('vaccine/selectTime',compact('vacdatas'));
    }

    public function confirm(){
        return view('reserveConfirm');
    }

    //view共通
    public function boot(){
        View::share('datas');
    }
}
