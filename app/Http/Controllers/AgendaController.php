<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    // ==========================================================================
    public function cria_evento()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_cria_evento()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function edita_evento()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_edita_evento()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function index()
    {
        echo 'teste';
    }
}
