<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use Hash;
use MatchOldPassword;
class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard');
    }

    public function police_account(){

        $districts = DB::table('districts')->get();
        $sectors   = DB::table('sectors')->get();
        $cells     = DB::table('cells')->get();

        return view('admin.create_police',compact('districts','sectors','cells'));
    }

    public function create_police_account(Request $request){


        $validated = $request->validate([
            'username' => 'required|unique:users|max:10',
            'name' => 'required',
            'email' => 'required|unique:users|max:30',
           
        ]);

        //SELECT ROLE

        $role = DB::table('roles')
                     ->SELECT('roles.*')
                     ->WHERE('name','Police')
                     ->first();

        
        //Getting Address IDS
       
        $request_district_id  = $request->district_id;
        $request_sector_id    = $request->sector_id;
        $request_cell_id      = $request->cell_id;
        

         //Getting District Name, Sector Name , Cell Name
         $get_district = DB::table('districts')
                                ->select('districts.*')
                                ->where('id',$request_district_id)
                                ->first();

         $get_sector   = DB::table('sectors')
                                ->select('sectors.*')
                                ->where('id',$request_sector_id)
                                ->first();


        $get_cell      = DB::table('cells')
                                ->select('cells.*')
                                ->where('id',$request_cell_id)
                                ->first();
        //Save Data
        $data =  array();
        $data['username']    = $request->username;
        $data['name']        = $request->name;
        $data['email']       = $request->email;
        $data['role_id']     = $role->id;
        $data['password']    = bcrypt($data['username']);
        $data['user_status'] = 1;
        $data['created_at']  = date('Y-m-d');

        $polices = DB::table('users')->insert($data);
        if($polices){

            //GETTING USER ID 
            $user_id = DB::table('users')->orderBy('id','desc')->first();

            //Save Address
            $address              = array();
            $address['user_id']   = $user_id->id;
            $address['district']  = $get_district->district_name;
            $address['sector']    = $get_sector->sector_name;
            $address['cell']      = $get_cell->cell_name;
            $address= DB::table('addresses')->insert($address);
            return redirect()->back()->with('success', 'Account Successful Create'); 
        }
         
    }

    public function community_account(){

        $districts = DB::table('districts')->get();
        $sectors   = DB::table('sectors')->get();
        $cells    = DB::table('cells')->get();

        return view('admin.create_community',compact('districts','sectors','cells'));
    }

    public function create_community_account(Request $request){

        $validated = $request->validate([
            'username'     => 'required|unique:users|max:10',
            'name'         => 'required',
            'email'        => 'required|unique:users|max:30',
            'phone_number' => ['required', 'digits:10'],
            'profile_image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

         //SELECT ROLE TYPE

         $role = DB::table('roles')
                    ->SELECT('roles.*')
                    ->WHERE('name','User')
                    ->first();

        //SAVE DATA

        $data                = array();
        $data['name']        = $request->name;
        $data['phone_number']= $request->phone_number;
        $data['email']       = $request->email;
        $data['username']    = $request->username;
        $data['role_id']     = $role->id;
        $data['user_status'] = 1;
        $data['password']    = bcrypt($data['username']);
        $data['created_at']  = date('Y-m-d');

        //Getting Address IDS
       
        $request_district_id  = $request->district_id;
        $request_sector_id    = $request->sector_id;
        $request_cell_id      = $request->cell_id;
        
        //Getting District Name, Sector Name , Cell Name
        $get_district = DB::table('districts')
                            ->select('districts.*')
                            ->where('id',$request_district_id)
                            ->first();
        
        $get_sector   = DB::table('sectors')
                            ->select('sectors.*')
                            ->where('id',$request_sector_id)
                            ->first();

        
        $get_cell     = DB::table('cells')
                            ->select('cells.*')
                            ->where('id',$request_cell_id)
                            ->first();


        //Image 

        $profile_image = $request->profile_image;


        if($profile_image){
            
            //Image One
            $image_one_name = hexdec(uniqid()). '.' .$profile_image->getClientOriginalExtension();
            Image::make($profile_image)->resize(300,300)->save( public_path('media/images/').$image_one_name); //Save local resources
            $data['profile_image'] = 'public/media/images/' .$image_one_name;

             //CHECK USER NAME ALREADY EXISTED


            $user_email  = DB::table('users')
                                ->SELECT('users.email')
                                ->WHERE('email',$data['email'])
                                ->first();

            if($user_email){
                 return redirect()->back()->with('success', 'Credentials Already Existed');
            }else{
                $community = DB::table('users')->insert($data);

                //GETTING USER ID
                $user_id = DB::table('users')->orderBy('id','desc')->first();

                //Saving Data

                $address              = array();
                $address['user_id']   = $user_id->id;
                $address['district']  = $get_district->district_name;
                $address['sector']    = $get_sector->sector_name;
                $address['cell']      = $get_cell->cell_name;

                $addresses = DB::table('addresses')->insert($address);
                //dd($addresses);
                return redirect()->back()->with('success', 'Account Successful Create'); 
            }
        }
    }

    public function manage_police(){

        $polices = DB::table('users')
                    ->join('addresses','users.id','addresses.user_id')
                    ->select('users.*','addresses.district')
                    ->where('role_id','3')
                    ->get();
                    //dd($polices);
        return view('admin.manage_police',compact('polices'));
    }

    public function viewAddresses($id){

        $data = DB::table('users')
                            ->join('addresses','users.id','addresses.user_id')
                            ->select('users.id','addresses.*')
                            ->where('user_id',$id)
                            ->first();
        return view('admin.view_address',compact('data'));
    }

    public function manage_community(){

        $communities = DB::table('users')
                            ->join('addresses','users.id','=','addresses.user_id')
                            ->select('users.*','addresses.*')
                            ->where('role_id','2')
                            ->get();
        return view('admin.manage_community',compact('communities'));
    }

    public function changePassword(){
        
        return view('admin.profile');
    }

    public function saveChangePassowrd(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function inactiveStatus($id){

        DB::table('users')->where('id',$id)->update(['user_status'=>0]);
        return redirect()->back()->with('success', 'Status Successful Updated'); 
    }

    public function activeStatus($id){

        DB::table('users')->where('id',$id)->update(['user_status'=>1]);
        return redirect()->back()->with('success', 'Status Successful Updated'); 
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
