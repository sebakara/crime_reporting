<?php

namespace App\Http\Controllers\Police;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    public function index()
    {
        return view('police.dashboard');
    }
}