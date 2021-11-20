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
<<<<<<< HEAD
        //DB::table('reserves')->truncate();
        //DB::table('reserve_people')->truncate();
        //DB::table('vaccination_datas')->truncate();
        //DB::table('clinics')->truncate();

        DB::table('reserves')->delete();
        DB::table('reserve_people')->delete();
        DB::table('vaccination_datas')->delete();
        DB::table('clinics')->delete();

        \DB::table('clinics')->insert([
                ['clinic_id' => 1000,
                'clinic_name' => 'A病院',
                'address' => '京都府京都市左京区'],
                ['clinic_id' => 1001,
                'clinic_name' => 'B病院',
                'address' => '京都府京都市左京区'],
                ['clinic_id' => 1002,
                'clinic_name' => 'Cクリニック',
                'address' => '京都府京都市伏見区'],
            ]);

        \DB::table('vaccination_datas')->insert([
                //A
                ['vaccination_data_id' => 100,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 2,
            ],
            ['vaccination_data_id' => 101,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 102,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 103,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '17:30',
                'capacity' => 20,
                'reserve_counts' => 18,
            ],
            ['vaccination_data_id' => 104,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-08',
                'vaccination_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 105,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-08',
                'vaccination_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 106,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-08',
                'vaccination_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 107,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 108,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 109,
                'clinic_id' => 1000,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 17,
            ],
            //B
            ['vaccination_data_id' => 110,
                'clinic_id' => 1001,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 111,
                'clinic_id' => 1001,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '17:30',
                'capacity' => 20,
                'reserve_counts' => 19,
            ],
            ['vaccination_data_id' => 112,
                'clinic_id' => 1001,
                'vaccination_date' => '2022-03-09',
                'vaccination_time' => '18:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            //C
            ['vaccination_data_id' => 113,
                'clinic_id' => 1002,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '14:00',
                'capacity' => 20,
                'reserve_counts' => 5,
            ],
            ['vaccination_data_id' => 114,
                'clinic_id' => 1002,
                'vaccination_date' => '2022-03-07',
                'vaccination_time' => '14:30',
                'capacity' => 20,
                'reserve_counts' => 10,
            ],
            ['vaccination_data_id' => 115,
                'clinic_id' => 1002,
                'vaccination_date' => '2022-03-08',
                'vaccination_time' => '14:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['vaccination_data_id' => 116,
                'clinic_id' => 1002,
                'vaccination_date' => '2022-03-08',
                'vaccination_time' => '14:30',
                'capacity' => 20,
                'reserve_counts' => 18,
            ],
        ]);


        /*foreach($clinics as $clinic){
            \App\Models\Clinic::create($clinic);
         }
        foreach($vaccination_datas as $vaccination_data){
            \App\Models\Vaccination_data::create($vaccination_data);
        } */
=======
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


        // foreach($clinics as $clinic){
        //     \App\Models\clinic::create($clinic);
        // }
>>>>>>> c2063d861c90a8398e304f06a3ad7184119c1261
        
    }
}
