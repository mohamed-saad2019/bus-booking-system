<?php

namespace Database\Seeders;

use App\Models\Chair;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1 ; $i <=12 ; $i++)
        {
            $data[] = array("bus_id" => "1");
            $data[] = array("bus_id" => "2");
        }

        Chair::insert($data);

    }
}
