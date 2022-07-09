<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

     /** SECTOR HAS BELONG TO MANY CELLS */

     public function cells(){
        
        return $this->hasMany('App\Models\Cell');
    }
}
