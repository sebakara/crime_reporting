<?php

namespace App\Http\Controllers\Police;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
                           ->get();
                           //dd($user_report);
        return view('police.show_insight',compact('user_report'));
    }

    public function edit_insight($id){

        $data       = DB::table('reports')
                                ->select('reports.*')
                                ->where('id',$id)
                                ->first();

        return view('police.edit_insight',compact('data'));
    }

    public function update_insight(Request $request, $id){

        $report_status  = DB::table('reports')
                                ->select('reports.*')
                                ->where('id',$id)
                                ->first();
        
        //Checking Report Status

        if($report_status->report_status=='Resolved'){


            $data =  array();

            $data['comment_status']     =  $request->comment_status;
            //$data['report_status']      =  $request->report_status;
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
                           ->get();
        return view('police.show_report',compact('reports'));

    }
}
