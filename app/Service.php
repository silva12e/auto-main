<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'title',
    	'type_id',
    	'description',
    	'price',
    ];

   public function type()
   {
        return $this->belongsTo(Service::class);
   }
   public function appointment()
   {
        return $this->hasMany(Appointment::class);
   }
}
