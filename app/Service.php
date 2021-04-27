<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function booking()
    {

        return $this->hasMany('App\Booking', 'service_id');
    }
    public function professional()
    {

        return $this->hasMany('App\Professional', 'service_id');
    }
}
