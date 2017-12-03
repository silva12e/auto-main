<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
    	'name',
    	'email',
    	'address',
    	'postal_code',
    	'primary_phone_number',
    	'secondary_phone_number',
    ];

    public function appointment()
    {
    	return $this->hasMany(Appointment::Class);
    }

    public function vehicle()
    {
        return $this->hasMany(Car::Class);
    }


}
