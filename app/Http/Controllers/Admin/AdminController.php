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

    public function create_police_account(Request $request){

        //SELECT ROLE

        $role = DB::table('roles')
                     ->SELECT('roles.*')
                     ->WHERE('name','Police')
                     ->first();
        //Save Data
        $data =  array();
        $data['username']    = $request->username;
        $data['name']        = $data['username'];
        $data['email']       = $request->email;
        $data['address_id']  = $request->district_id;
        $data['role_id']     = $role->id;
        $data['password']    = bcrypt($data['username']);
        $data['created_at']  = date('Y-m-d');
        $police = DB::table('users')->insert($data);

        return Redirect()->back()->with('Account Successful Create');
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

    public function getSectors($district_id){

        $sectorname = DB::table('sectors')
                       ->where('district_id',$district_id)
                       ->get();
        return json_encode($sectorname);
    }

    public function getCells($sector_id){

        $cellname = DB::table('cells')
                      ->where('sector_id',$sector_id)
                      ->get();
        return json_encode($cellname);
    }
}
