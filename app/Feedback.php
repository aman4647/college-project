<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedbacks';

    public function user()
    {

        return $this->belongsTo('App\User');
    }
    public function professional()
    {
           return $this->belongsTo('App\Professional');
    }
    public function booking()
    {

        return $this->belongsTo('App\Booking');
    }
}
