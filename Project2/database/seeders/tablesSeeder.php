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
        //DB::table('reserves')->truncate();
        //DB::table('reserve_people')->truncate();
        //DB::table('reservation_datas')->truncate();
        //DB::table('places')->truncate();

        DB::table('reserves')->delete();
        DB::table('reserve_people')->delete();
        DB::table('reservation_datas')->delete();
        DB::table('places')->delete();

        \DB::table('places')->insert([
                ['place_id' => 1000,
                'place_name' => 'A病院',
                'address' => '京都府京都市左京区'],
                ['place_id' => 1001,
                'place_name' => 'B病院',
                'address' => '京都府京都市左京区'],
                ['place_id' => 1002,
                'place_name' => 'Cクリニック',
                'address' => '京都府京都市伏見区'],
            ]);

        \DB::table('reservation_datas')->insert([
                //A
                ['reservation_data_id' => 100,
                'place_id' => 1000,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 2,
            ],
            ['reservation_data_id' => 101,
                'place_id' => 1000,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 102,
                'place_id' => 1000,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 103,
                'place_id' => 1000,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '17:30',
                'capacity' => 20,
                'reserve_counts' => 18,
            ],
            ['reservation_data_id' => 104,
                'place_id' => 1000,
                'reservation_date' => '2022-03-08',
                'reservation_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 105,
                'place_id' => 1000,
                'reservation_date' => '2022-03-08',
                'reservation_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 106,
                'place_id' => 1000,
                'reservation_date' => '2022-03-08',
                'reservation_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 107,
                'place_id' => 1000,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '16:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 108,
                'place_id' => 1000,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '16:30',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 109,
                'place_id' => 1000,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 17,
            ],
            //B
            ['reservation_data_id' => 110,
                'place_id' => 1001,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '17:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 111,
                'place_id' => 1001,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '17:30',
                'capacity' => 20,
                'reserve_counts' => 19,
            ],
            ['reservation_data_id' => 112,
                'place_id' => 1001,
                'reservation_date' => '2022-03-09',
                'reservation_time' => '18:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            //C
            ['reservation_data_id' => 113,
                'place_id' => 1002,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '14:00',
                'capacity' => 20,
                'reserve_counts' => 5,
            ],
            ['reservation_data_id' => 114,
                'place_id' => 1002,
                'reservation_date' => '2022-03-07',
                'reservation_time' => '14:30',
                'capacity' => 20,
                'reserve_counts' => 10,
            ],
            ['reservation_data_id' => 115,
                'place_id' => 1002,
                'reservation_date' => '2022-03-08',
                'reservation_time' => '14:00',
                'capacity' => 20,
                'reserve_counts' => 20,
            ],
            ['reservation_data_id' => 116,
                'place_id' => 1002,
                'reservation_date' => '2022-03-08',
                'reservation_time' => '14:30',
                'capacity' => 20,
                'reserve_counts' => 18,
            ],
        ]);


        /*foreach($places as $place){
            \App\Models\place::create($place);
         }
        foreach($reservation_datas as $reservation_data){
            \App\Models\reservation_data::create($reservation_data);
        } */
        
    }
}
