<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function users(){

        return $this->belongsTo('App\Models\User');
    }

    public function reports(){

        return $this->belongsTo('App\Models\Report');
    }
}
