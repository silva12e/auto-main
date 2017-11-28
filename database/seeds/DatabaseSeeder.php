<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$faker = Faker\Factory::create();
         DB::table('customers')->insert([
        'name' => $faker->name,
        'email' => $faker->email,
        'street_address' => $faker->address,
        'postal_code' => 'V0V 0V0',
        'primary_phone_number'=>$faker->phoneNumber, 
        'secondary_phone_number'=>$faker->phoneNumber,
    	'created_at'=>Carbon::now()]);
    }
}
