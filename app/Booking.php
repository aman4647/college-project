<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   
    public function user()
    {

        return $this->belongsTo('App\User');
    }

        public function service()
    {

        return $this->belongsTo('App\Service');
    }

        public function professional()
    {

        return $this->belongsTo('App\Professional');
    }

    public function feedback()
    {

        return $this->hasMany('App\Feedback', 'Feedback_id');
    }
}
