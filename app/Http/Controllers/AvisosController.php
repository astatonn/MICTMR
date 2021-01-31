<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisosController extends Controller
{
     
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    // ==========================================================================
    public function index()
    {
        echo 'teste';
    }

    // ==========================================================================
     public function cria_aviso()
     {
         echo 'teste';
     }
 
     // ==========================================================================
     public function submit_cria_aviso()
     {
         echo 'teste';
     }
 
     // ==========================================================================
     public function edita_aviso()
     {
         echo 'teste';
     }
 
     // ==========================================================================
     public function submit_edita_aviso()
     {
         return view('home');
     }
 
}
