<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'service_id' => 1,
    	'vehicle_id' => 1,
    	'customer_id' => 1,
    	'date' => '10/10/2018',
    	'time' => '1:00 pm',
    	'title' => 'Appointment Title here',
    	'created_at' => Carbon::now()
    ];
});
