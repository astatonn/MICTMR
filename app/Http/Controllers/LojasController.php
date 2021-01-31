<?php

namespace App\Http\Controllers;

use App\Models\lojas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    // ==========================================================================
    public function nova_loja()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_nova_loja()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function index(Request $request)
    {   
        $session = $request->session()->get("permissions");
        $lojas = lojas::all();
        return view("lojas.index",
        [
            'permission'=>$session,
            'lojas'=>$lojas       
        ]);
    }

    // ==========================================================================
    public function editar_loja()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_editar_loja()
    {
        echo 'teste';
    }

}
