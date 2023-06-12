<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
      
        for($i=1;$i<25;$i++)
        {
            $user = new Admin;
        $user->Name = $faker->name;
        $user->Email = $faker->email;
        $user->Password = Hash::make('secret');
        $user->save();
        }
    }
    
}
