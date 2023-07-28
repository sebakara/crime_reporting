<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    public function users(){

        return $this->belongsTo('App\Models\User');
    }

    public function addresses(){

        return $this->hasMany('App\Models\Address');
    }
}
