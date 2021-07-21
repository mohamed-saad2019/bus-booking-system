<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id"            => 1                      ,
                "name"          => 'رحلة القاهره - أسيوط',
                "take_off_time" => '05:50:00',
                "expected_time" => '6 ساعات' ,
                "distance"      => '2000 ك'  ,
                "from_gov"      => '1'       ,
                "to_gov"        => '16'      ,
                "bus_id"        => '1'       ,
                "status"        => '0'    
            ],
            [
                "id"            => 2                      ,
                "name"          => 'رحلة القاهره - شمال سيناء',
                "take_off_time" => '03:30:00',
                "expected_time" => '4 ساعات' ,
                "distance"      => '1000 ك'  ,
                "from_gov"      => '1'       ,
                "to_gov"        => '26'      ,
                "bus_id"        => '2'       ,
                "status"        => '0'    
            ],
            
        ];

        Trip::insert($data);
    }
}
