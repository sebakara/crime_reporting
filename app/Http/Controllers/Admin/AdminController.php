<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use Hash;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function index()
    {
        $kacyiru       = DB::table('reports')
                                ->join('addresses','addresses.report_id','reports.id')
                                ->where('addresses.sector','Kacyiru')
                                ->get();

        $Kimihurura    = DB::table('reports')
                                ->join('addresses','addresses.report_id','reports.id')
                                ->where('addresses.sector','Kimihurura')
                                ->get();


        $Kimironko     = DB::table('reports')
                                ->join('addresses','addresses.report_id','reports.id')
                                ->where('addresses.sector','Kimironko')
                                ->get();

        $kacyiru_count    = $kacyiru->count();
        $Kimihurura_count = $Kimihurura->count();
        $Kimironko_count  = $Kimironko->count();

        return view('admin.dashboard', compact('kacyiru_count','Kimihurura_count','Kimironko_count'));
    }

    public function police_account(){

        $districts = DB::table('districts')->get();
        $sectors   = DB::table('sectors')->get();
        $cells     = DB::table('cells')->get();

        return view('admin.create_police',compact('districts','sectors','cells'));
    }


    public function sector_account(){

        $districts = DB::table('districts')->get();
        $sectors   = DB::table('sectors')->get();
        $cells     = DB::table('cells')->get();

        return view('admin.create_sector_officer',compact('districts','sectors','cells'));
    }

    // create sector officer
    public function create_sector_officer_account(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:10',
            'name' => 'required',
            'email' => 'required|unique:users|max:30',
        ]);
        //SELECT ROLE
        $role = DB::table('roles')
                     ->SELECT('roles.*')
                     ->WHERE('name','Sector_officer')
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
        $data['sector']     = $get_sector->sector_name;
        $data['password']    = bcrypt($data['username']);
        $data['user_status'] = 1;
        $data['created_at']  = date('Y-m-d');

        $sector_officer = DB::table('users')->insert($data);
        if($sector_officer ){
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
        $data['sector']     = $get_sector->sector_name;
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
            'username'     => 'required|unique:users|regex:/^[\pL\s\-]+$/u|max:15',
            'name'         => 'required|regex:/^[\pL\s\-]+$/u|max:20',
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
            Image::make($profile_image)->resize(300,300)->save(public_path('photo/').$image_one_name); //Save local resources
            $data['profile_image'] = 'public/photo/' .$image_one_name;

             //CHECK USER NAME ALREADY EXISTED

            $user_email  = DB::table('users')
                                ->SELECT('users.email')
                                ->WHERE('email',$data['email'])
                                ->first();

            if($user_email){
                 return redirect()->back()->with('success', 'Credentials Already Existed');
            }else{
                $data['sector']     = $get_sector->sector_name;
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
                    // dd($polices);
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
                            ->select('users.*','addresses.district')
                            ->where('role_id','2')
                            ->get();
                            // dd($communities);

        return view('admin.manage_community',compact('communities'));
    }


    // manage_sector

    public function manage_sector(){

        $sector_officers = DB::table('users')
                            ->join('addresses','users.id','=','addresses.user_id')
                            ->select('users.*','addresses.district')
                            ->where('role_id','3')
                            ->get();
                            // dd($communities);

        return view('admin.manage_sector_officers',compact('sector_officers'));
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

    public function show_report(Request $request){

        $fromDate      = $request->has('date')?$request->get('date').' 09:59:00':Carbon::yesterday()->format('Y-m-d').' 09:59:00';
        $toDate        = $request->has('to_date')?date('Y-m-d', strtotime($request->input('to_date'). ' + 1 days')).' 10:00:00':Carbon::now();
        $report_status = $request->report_status;
        $reports = DB::table('reports')
                            ->join('addresses','reports.id','addresses.report_id')
                            ->select('reports.*','addresses.*')
                            ->whereBetween('reports.created_at', [$fromDate, $toDate])
                            ->where('reports.report_status',$report_status)
                            ->get();
    // dd($reports);

        return view('admin.show_report',compact('reports','fromDate','toDate'));
    }
    public function summary_report(Request $request){

//        $fromDate      = $request->has('date')?$request->get('date').' 00:00:00':Carbon::yesterday()->format('Y-m-d').' 00:00:00';
//        $toDate        = $request->has('to_date')?date('Y-m-d', strtotime($request->input('to_date'). ' + 1 days')).' 23:59:00':Carbon::now();
        $toDate=$request->to_date;
            $fromDate = $request->date;
        $sector = $request->sector;
        $district = $request->discrict;
        $cell = $request->cell;
        $type = $request->type;
        $report_status = $request->status;
        $reports = DB::table('reports')
            ->join('addresses','reports.id','addresses.report_id')
            ->select('reports.*','addresses.*')
                ->when($fromDate && $toDate, function ($query, $fromDate, $toDate) {
                    return $query->whereBetween('reports.created_at', [$fromDate, $toDate]);
                })
            ->when($sector, function ($query, $sector) {
                return $query->where('addresses.sector', $sector);
            })
            ->when($district, function ($query, $district) {
                return $query->where('addresses.district', $district);
            })
            ->when($cell, function ($query, $cell) {
                return $query->where('addresses.cell', $cell);
            })
            ->when($type, function ($query, $type) {
                return $query->where('reports.report_title', $type);
            })
            ->when($report_status, function ($query, $report_status) {
                return $query->where('reports.report_status', $report_status);
            })
            ->get();
        // dd($reports);

        return view('admin.summary_report',compact('reports','fromDate','toDate'));
    }

    public function show_address_report(Request $request){

        $districts     = DB::table('districts')->get();
        $sectors       = DB::table('sectors')->get();
        $cells         = DB::table('cells')->get();

        $district      = $request->district_id;
        $sector        = $request->sector_id;
        $cell          = $request->cell_id;

        $address_report = DB::table('districts')
                              ->join('sectors','sectors.district_id','districts.id')
                              ->join('cells','sectors.id','cells.sector_id')
                              ->select('districts.*','sectors.*','cells.*')
                              ->where('districts.id',$district)
                              ->where('sectors.district_id',$district)
                              ->where('cells.sector_id',$sector)
                              ->where('cells.id',$cell)
                              ->first();


        if(!empty($address_report)){

            $district_to = $address_report->district_name;
            $sector_to   = $address_report->sector_name;
            $cell_to     = $address_report->cell_name;


            $reports     = DB::table('reports')
                                ->join('addresses','reports.id','addresses.report_id')
                                ->select('reports.*','addresses.*')
                                ->where('addresses.district',$district_to)
                                ->where('addresses.sector',$sector_to)
                                ->where('addresses.cell',$cell_to)
                                ->get();

        }else{

            return redirect()->back()->with("success","The address is not found!");

        }

        return view('admin.show_address_report',compact('reports','districts','sectors','cells'));

    }

}
