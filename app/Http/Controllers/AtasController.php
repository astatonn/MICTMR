<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtasController extends Controller
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
     public function editar_ata()
     {
         echo 'teste';
     }
 
     // ==========================================================================
     public function ata_enviar()
     {
         echo 'teste';
     }
     
     // ==========================================================================
     public function criar_nova_ata()
     {
         echo 'teste';
     }
     
     // ==========================================================================
     public function submit_criar_nova_ata()
     {
         echo 'teste';
     }
}
