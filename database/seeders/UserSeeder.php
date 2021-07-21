<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"      =>  "mohamed"           ,
            "phone"     =>  "01069195365"       ,
            "email"     =>  "mohamed@gmail.com" ,
            "password"  =>  bcrypt(123456789)
        ]);
    }
}
