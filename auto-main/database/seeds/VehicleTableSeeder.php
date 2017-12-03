<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VehicleTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
         DB::table('Cars')->insert([
        'customer_id' => 1,
        'type_id' => 1,
        'color' => $faker->unique()->safeEmail,
        'model' => $faker->name,
        'engine' => str_random(10),
        'year' => str_random(10),
        'make' => str_random(10),
        'odometer_meter' => str_random(10),
    	'created_at' => Carbon::now(),
    	'updated_at' => Carbon::now()]);
    }
}
