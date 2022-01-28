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


class mypageController extends Controller
{
    public function display(Request $request){
        //toを決める
        $keyto = $request->input('keyto');
        if ($request->get('dataget') == 'delete') {
            echo "delete";
        } else if($request->get('dataget') == 'change'){
            echo "change";
        }
        //  ユーザ認証関連
            //ログイン情報取得
            $auths = Auth::user();
            $reserves = null;

            $keyDid = $request->input('keyresd');//reservation_data_id
            $keyres = $request->input ('keyres');//reserve_id

            // echo $keyres;
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

        //  ユーザの予約
            // ログイン済みのときの処理
            $residgets = reserve::select('reservation_data_id')->where('users_id',$auths->id)->where('cancel',0)->get();

            $keynum = 0;
            $reserves = null;
            foreach($residgets as $residget){
                $reserves[$keynum] = reservation_data::where('reservation_data_id',$residget['reservation_data_id'])->first();
                //場所の名前
                $pid = $reserves[$keynum]['place_id'];
                // echo $pid;
                // echo "<br><br>1" . $reserves[$keynum];
                $pname = place::where('place_id',$pid)->first();
                $reserves[$keynum]['place_name'] = $pname['place_name'];

                $rid = reserve::select('reserve_id')->where('reservation_data_id',$residget['reservation_data_id'])->first();
                $reserves[$keynum]['reserve_id'] = $rid['reserve_id'];
                // echo "<br>2" . $reserves[$keynum];
                $keynum++;
            }

            return view('mypageD',compact('keyDid','date','time','place','auths','reserves','keyres'));
    }


}
