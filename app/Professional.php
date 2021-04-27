<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    public function booking()
    {

        return $this->hasMany('App\Booking', 'professional_id');
    }
    public function feedback()
    {

        return $this->hasMany('App\Feedback', 'professional_id');
    }
    public function service()
    {

        return $this->belongsTo('App\Service');
    }
}
