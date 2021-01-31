<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoricoController extends Controller
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
    public function pesquisa_historico()
    {
        echo 'teste';
    }

}
