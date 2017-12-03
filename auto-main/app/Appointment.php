<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
    	'vehicle_id',
    	'service_id',
    	'customer_id',
    	'date',
        'time'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Car', 'vehicle_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
