<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function category(){
        return $this->hasmany('App\Categories','parent_id');
    }
}
