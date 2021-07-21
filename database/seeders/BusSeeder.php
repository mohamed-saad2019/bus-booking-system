<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
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
                "id"            => 1          ,
                "licence_num"   => '52458745' ,
                "bus_num"       => 'ا ي ج 524',
                "status"        => 1
            ],
            [
                "id"            => 2          ,
                "licence_num"   => '98563254' ,
                "bus_num"       => 'ا خ م 852',
                "status"        => 1
            ]
        ];
        
        Bus::insert($data);
    }
}
