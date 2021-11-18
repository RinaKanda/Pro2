<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('clinics')->truncate();

        \DB::table('clinics')->insert([
            ['clinic_id' => 1000,
            'clinic_name' => 'A病院',
            'address' => '京都府京都市左京区'],
            ['clinic_id' => 2000,
            'clinic_name' => 'B病院',
            'address' => '京都府京都市左京区'],
            ['clinic_id' => 3000,
            'clinic_name' => 'Cクリニック',
            'address' => '京都府京都市伏見区'],
        ]);

        foreach($clinics as $clinic){
            \App\clinic::create($clinic);
        }
        
    }
}
