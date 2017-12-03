<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'customer_id',
    	'make',
        'model',
    	'year',
    	'color',
    	'engine',
    	'odometer_meter',
    ];

    public function appointment()
    {
    	return $this->hasMany(Appointment::class);
    }

    public function type()
    {
        return $this->hasOne(Type::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::Class);
    }
}
