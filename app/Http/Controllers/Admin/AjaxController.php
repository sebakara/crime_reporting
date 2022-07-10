<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function getSectors($district_id){

        $sectors = DB::table('sectors')
                       ->where('district_id',$district_id)
                       ->get();
        return json_encode($sectors);
    }
}
