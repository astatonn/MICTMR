<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // ==========================================================================
    public function index(Request $request)
    {
        $permissions=Auth::user()->permissions;
        $request->session()->put('permissions', $permissions);
        return view('home');
    }

 
}
