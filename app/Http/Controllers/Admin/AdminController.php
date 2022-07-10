<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard');
    }

    public function police_account(){
        $districts = DB::table('districts')->get();
        $sectors   = DB::table('sectors')->get();
        $cells    = DB::table('cells')->get();
        return view('admin.create_police',compact('districts','sectors','cells'));
    }

    public function community_account(){
        
        return view('admin.create_community');
    }

    public function manage_police(){

        return view('admin.manage_police');
    }

    public function manage_community(){

        return view('admin.manage_community');
    }
}
