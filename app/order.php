<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function orders(){
        return $this->belongsTo('App\OrderProduct');
    }
}
