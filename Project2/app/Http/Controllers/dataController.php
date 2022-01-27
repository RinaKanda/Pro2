<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
//use Model
use App\Models\place;
use App\Models\reservation_data;
use App\Models\reserve;
use App\Models\reserve_person;
use Illuminate\Support\Facades\DB;


class dataController extends Controller
{
    public function delete(Request $request){
         //  ユーザ認証関連
            //ログイン情報取得
            $auths = Auth::user();
            $keyDid = $request->input('keyres');
           
            $reserves = null;
            $regok = 2;

            

    }
}