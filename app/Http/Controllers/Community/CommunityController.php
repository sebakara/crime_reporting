<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Image;
use Hash;
use MatchOldPassword;
use Illuminate\Support\Str;
use PDF;
use App\Models\Report;
use Carbon\Carbon;
class CommunityController extends Controller
{
    public function index()
    {
        return view('community.dashboard');
    }

    public function submit_report(){
        
        //User CPC Address
        $user_address     = DB::table('addresses')
                                ->select('addresses.*')
                                ->where('user_id',Auth::user()->id)
                                ->first();
        $district_address = $user_address->district;
        $sector_address   = $user_address->sector;
        $cell_address     = $user_address->cell;

        //Police Address

        $police_address   = DB::table('users')
                                ->join('addresses','users.id','=','addresses.user_id')
                                ->select('users.*','addresses.*')
                                ->where('district',$district_address)
                                ->where('sector',$sector_address)
                                ->where('cell',$cell_address)
                                ->where('role_id',3)
                                ->first();
    
       
        return view('community.submit_report',compact('user_address','police_address'));
    }

    public function store_report(Request $request){

        $validated = $request->validate([
            'report_title'     => 'required|max:40',
            'descriptions'     => 'required',
            'delivery_to'      => 'required|max:30',
        ]);
        
        $data = array();

        $data['report_title'] = $request->report_title;
        $data['descriptions'] = $request->descriptions;
        $data['delivery_to']  = $request->delivery_to;
        $data['report_status']= "Pending";
        $data['status']= "0";
        $data['created_at']   = date('Y-m-d H:i:s');
        $data['user_id']      = Auth::user()->id;

        //Checking if delivery name existed

        if($data['delivery_to'] == 'Unkown Name'){

            return redirect()->back()->with("success","This Message Can not be Send Because Unkown Police Name");

        }
        else{
            
            $report = DB::table('reports')->insert($data);

             //GETTING REPORT ID
            $report_id = DB::table('reports')->orderBy('id','desc')->first();

            if(!empty($report_id->id)){

                $address              = array();
                $address['report_id'] = $report_id->id;
                $address['district']  = $request->district;
                $address['sector']    = $request->sector;
                $address['cell']      = $request->cell;
    
                $address = DB::table('addresses')->insert($address);
                return redirect()->back()->with("success","Report Successful Submitted");

            }else{

                $address = array();
                $address['report_id'] = 1;
                $address['district']  = $request->district;
                $address['sector']    = $request->sector;
                $address['cell']      = $request->cell;
    
                $address = DB::table('addresses')->insert($address);
                return redirect()->back()->with("success","Report Successful Submitted");
            }
           

        }
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

    public function approve_report($id){
        DB::table('reports')
            ->where('id', $id)
            ->update([
                'status' => 1,
                'report_status' => 'FollowUp',
            ]);
        // $report = DB::table('reports')->find($id);
        // $report->status = 1;
        // $report->report_status = 'approved';
        // $report->save();
        return redirect()->back()->with('success', 'The report is now approved');
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
            return Redirect()->back()->with('success','There is a followup on this report you can not Modify it Anymore');
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

    public function show_report(Request $request){

        $fromDate      = $request->has('date')?$request->get('date').' 09:59:00':Carbon::yesterday()->format('Y-m-d').' 09:59:00';
        $toDate        = $request->has('to_date')?date('Y-m-d', strtotime($request->input('to_date'). ' + 1 days')).' 10:00:00':Carbon::now();
        $report_status = $request->report_status;
        $reports = DB::table('reports')
                            ->select('reports.*')
                            ->whereBetween('reports.created_at', [$fromDate, $toDate])
                            ->Where('user_id',Auth::user()->id)
                            ->where('reports.report_status',$report_status)
                            //->whereBetween('reports.report_status', ['Resolved','Pending','FollowUp'])
                            ->get();
        // dd($reports);
        return view('community.show_report',compact('reports','fromDate','toDate'));
    }


}
