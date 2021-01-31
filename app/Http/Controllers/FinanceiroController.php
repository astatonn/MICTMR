<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceiroController extends Controller
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
    public function entrada_fin()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_entrada_fin()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function saida_fin()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_saida_fin()
    {
        echo 'teste';
    }
}
