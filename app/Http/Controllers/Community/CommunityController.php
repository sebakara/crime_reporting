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

        return view('community.submit_report');
    }

    public function store_report(Request $request){

    }

    public function view_report(){

        return view('community.view_report');
    }

    public function edit_report(){

        return view('community.edit_report');
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
