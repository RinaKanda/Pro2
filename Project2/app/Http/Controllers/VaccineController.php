<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use request
use App\Models\clinic;

class VaccineController extends Controller
{
    //

    public function show(){
        echo("HEllo");
        return view('newReserve');
    }
    public function place(){
        
        $clinics = clinic::all();
            return view('vaccine/selectPlace',compact('clinics'));
    }
    public function day(){
        return view('vaccine/selectDay');
    }
}
