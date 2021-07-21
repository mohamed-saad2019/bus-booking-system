<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BusSeeder::class,
            GovernorateSeeder::class,
            UserSeeder::class,
            ChairSeeder::class,
            TripSeeder::class,
            StationSeeder::class,
            BookingSeeder::class,
        ]); 
    }
}
