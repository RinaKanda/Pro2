<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use request
use App\Models\clinic;
use App\Models\vaccination_data;


class VaccineController extends Controller
{
    //

    public function place(){
        
        $clinics = clinic::all();
        return view('vaccine/selectPlace',compact('clinics'));
    }

    public function day(Request $request){
        $key = $request->input('place','1001');
        $vacdatas = vaccination_data::where('clinic_id',$key)->get();
        $place = clinic::select('clinic_name')->where('clinic_id',$key)->get();
        // $vacdatas = vaccination_data::all();clinic_name
        // echo $place;
        return view('vaccine/selectDay',compact('vacdatas','place'));
    }

    public function Time(){

        $vacdatas = vaccination_data::all();
        return view('vaccine/selectTime',compact('vacdatas'));
    }

    public function confirm(){
        return view('reserveConfirm');
    }
}
