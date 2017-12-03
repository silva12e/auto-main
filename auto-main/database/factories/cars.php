<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
    	'make' => 'Chevrolet',
    	'year' => '10000',
    	'odometer_meter'=> '111111 km',
    	'engine' => 'V8',
		'color' => 'red',
		'model' => 'Equinox',
        'customer_id' => 1,
        'type_id' => 1,        
    ];
});
