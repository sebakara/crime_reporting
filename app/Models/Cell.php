<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;
    public function sectors(){

        return $this->belongsTo('App\Models\Sector');
    }
}
