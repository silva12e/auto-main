<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) 
{
    return [
    	'name' => $faker->name,
    	'email' => $faker->email,
    	'street_address' => $faker->sentence,
    	'postal_code' => 'a1a1a1',
    	'primary_phone_number' => '111 111 1111',
    	'secondary_phone_number' => '111 111 1111'
    ];
});
