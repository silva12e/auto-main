<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = [
    	'type'
    ];

    public function service()
    {
    	return $this->hasMany(Service::class);
    }

    public function car()
    {
    	return $this->belongsTo(Car::class);
    }
}
