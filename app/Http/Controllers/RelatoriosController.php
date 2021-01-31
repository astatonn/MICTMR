<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatoriosController extends Controller
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
    public function gerar_relatorio()
    {
        echo 'teste';
    }
}
