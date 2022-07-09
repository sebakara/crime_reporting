<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public function users(){
        
        return $this->belongsTo('App\Models\User');
    }

    /** DISTRICT BELONGS TO MANY SECTOR */

    public function sectors(){

        return $this->hasMany('App\Models\Sector');
    }
}
