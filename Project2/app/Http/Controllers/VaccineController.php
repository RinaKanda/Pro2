<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use request
use App\Models\clinic;

class VaccineController extends Controller
{
    //

    public function place(){
        
        $clinics = clinic::all();
        return view('vaccine/selectPlace',compact('clinics'));
    }

    public function day(){
        return view('vaccine/selectDay');
    }

    public function Time(){
        return view('vaccine/selectTime');
    }

    public function confirm(){
        return view('reserveConfirm');
    }
}
