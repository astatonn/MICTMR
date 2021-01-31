<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroUsuarioController extends Controller
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
    public function cadastro_usuario()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_cadastro_novo_usuario()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function edita_usuario()
    {
        echo 'teste';
    }

    // ==========================================================================
    public function submit_edita_usuario()
    {
        echo 'teste';
    }

    
}
