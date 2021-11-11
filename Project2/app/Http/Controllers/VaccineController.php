<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use request
//use model

class VaccineController extends Controller
{
    //

    public function show(){
        echo("HEllo");
        return view('newReserve');
    }
    public function place(){
        // $clinics = clinics::;

        return view('vaccine/selectPlace',compact('clinics'));
    }
}
