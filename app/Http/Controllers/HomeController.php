<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login(Request $request){
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($result){
            $user = Auth::user();

            // var_dump($user->role_id);
            // exit();
            if($user->role_id == 1)
                return redirect(route('admin.dashboard'));
            elseif($user->role_id == 2)
                return redirect(route('community.dashboard'));
            elseif($user->role_id == 3)
                return redirect(route('sector.dashboard'));
            else
                return redirect(route('police.dashboard'));
        }else{
            return redirect()->back()->with('success', 'These credentials do not match our records');
        }
    }
}
