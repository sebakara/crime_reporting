<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use Hash;
use MatchOldPassword;

class CommunityController extends Controller
{
    public function index()
    {
        return view('community.dashboard');
    }

    public function submit_report(){
        
        $user_address = DB::table('addresses')
                                ->select('addresses.*')
                                ->where('user_id',Auth::user()->id)
                                ->first();
        $district_address = $user_address->district;
        $sector_address   = $user_address->sector;
        $cell_address     = $user_address->cell;


        $police_address   = DB::table('users')
                                ->join('addresses','users.id','=','addresses.user_id')
                                ->select('users.*','addresses.*')
                                ->where('district',$district_address)
                                ->where('sector',$sector_address,)
                                ->where('cell',$cell_address)
                                ->first();
        return view('community.submit_report',compact('user_address','police_address'));
    }

    public function store_report(Request $request){

    }

    public function view_report(){

        $reports = DB::table('reports')
                            ->select('reports.*')
                            ->get();
                           
        return view('community.view_report',compact('reports'));
    }

    public function edit_report($id){

        $report = DB::table('reports')
                            ->select('reports.*')
                            ->where('id',$id)
                            ->first();
        return view('community.edit_report',compact('report'));
    }

    public function updateReport(Request $request, $id){

        $report_status  = DB::table('reports')
                                ->select('reports.*')
                                ->where('id',$id)
                                ->first();
        
        //Checking Report Status

        if($report_status->report_status=='Pending'){


            $data =  array();

            $data['report_title']     =  $request->report_title;
            $data['descriptions']     =  $request->descriptions;
            $data['updated_at']       =  date('Y-m-d H:i:s');

            $update = DB::table('reports')->where('id',$id)->update($data);
            
          
            if($update){
                return Redirect()->route('community.view.report')->with('success','Report Successful Updated');

            }
        }else{
            return Redirect()->back()->with('success','There is a followup on this report you can not Modify Anymore');
        }

    }

    public function change_password(){

        return view('community.change_password');
    }

    public function update_password(Request $request){
        
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with("success","Password successfully changed!");
    }

}
