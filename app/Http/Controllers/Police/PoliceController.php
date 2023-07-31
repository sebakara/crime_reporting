<?php

namespace App\Http\Controllers\Police;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class PoliceController extends Controller
{
    public function index()
    {

        return view('police.dashboard');
    }

    public function show_insight(){

        $user_report = DB::table('users')
                           ->join('reports','users.id','reports.user_id')
                           ->join('addresses','reports.id','addresses.report_id')
                           ->select('users.name','reports.*',DB::raw("CONCAT(addresses.district,' ',addresses.sector,' ',addresses.cell) AS address"))
                           ->where('reports.report_status','FollowUp')
                           ->get();
                           //dd($user_report);
        return view('police.show_insight',compact('user_report'));
    }

    public function edit_insight($id){

        $data       = DB::table('reports')
                                ->select('reports.*')
                                ->where('id',$id)
                                 ->where('reports.report_status','FollowUp')
                                ->first();

        return view('police.edit_insight',compact('data'));
    }

    public function update_insight(Request $request, $id){

        $validated = $request->validate([

            'comment_status'  => 'required',
        ]);


        $report_status  = DB::table('reports')
                                ->select('reports.*')
                                ->where('id',$id)
                                ->first();

                               // dd($report_status);
        
        //Checking Report Status

        if($report_status->report_status!='Resolved'){


            $data =  array();

            $data['comment_status']     =  $request->comment_status;
            $data['report_status']      =  "Resolved";
            $data['updated_at']         =  date('Y-m-d H:i:s');

            $update = DB::table('reports')->where('id',$id)->update($data);
            
          
            if($update){
                return Redirect()->route('police.show.report')->with('success','Report Successful Comment');

            }
        }else{
            return Redirect()->back()->with('success','This Crime Report has been Closed');
        }

    }

    public function show_report(){
        $reports = DB::table('users')
                           ->join('reports','users.id','reports.user_id')
                           ->join('addresses','reports.id','addresses.report_id')
                           ->select('users.name','reports.*',DB::raw("CONCAT(addresses.district,' ',addresses.sector,' ',addresses.cell) AS address"))
                           ->where('reports.report_status','Resolved')
                           ->get();
        return view('police.show_report',compact('reports'));

    }

    public function view_message(){

        $user_report = DB::table('users')
                            ->join('reports','users.id','reports.user_id')
                            ->join('addresses','reports.id','addresses.report_id')
                            ->select('users.name','reports.*',DB::raw("CONCAT(addresses.district,' ',addresses.sector,' ',addresses.cell) AS address"))
                            ->where('reports.report_status','Pending')
                            ->where('reports.delivery_to',Auth::user()->name)
                            ->get();
                           // dd($user_report);
        
        return view('police.view_message',compact('user_report'));
    }

    public function read_message(Request $request, $id){

        $user_report = DB::table('users')
                                ->join('reports','users.id','reports.user_id')
                                ->join('addresses','reports.id','addresses.report_id')
                                ->select('users.name','reports.*',DB::raw("CONCAT(addresses.district,' ',addresses.sector,' ',addresses.cell) AS address"))
                                ->where('reports.report_status','Pending')
                                ->where('reports.delivery_to',Auth::user()->name)
                                ->where('reports.id',$id)
                                ->first();

                                //dd($user_report);
        return view('police.read_more',compact('user_report'));
    }

    public function update_read_message(Request $request ,$id){

            $data                   =  array();
            $data['report_status']  =  "FollowUp";
            //$id                     =  $request->id;
            $update = DB::table('reports')->where('id',(int)$id)->update($data);

            if($update){
                return Redirect()->route('police.view.message');

            }

    }

    public function changePassword(){

        return view('police.profile');
        
    }

    public function store_password(Request $request){
        
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function report(Request $request){

        $fromDate      = $request->has('date')?$request->get('date').' 09:59:00':Carbon::yesterday()->format('Y-m-d').' 09:59:00';
        $toDate        = $request->has('to_date')?date('Y-m-d', strtotime($request->input('to_date'). ' + 1 days')).' 10:00:00':Carbon::now();
        $report_status = $request->report_status;
        $reports       = DB::table('reports')
                            ->select('reports.*')
                            ->whereBetween('reports.created_at', [$fromDate, $toDate])
                            ->Where('delivery_to',Auth::user()->name)
                            ->where('reports.report_status',$report_status)
                            ->get();

        return view('police.report',compact('reports','fromDate','toDate'));
    }
}
