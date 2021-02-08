<?php

namespace App\Http\Controllers;

use App\Models\entrada_fins;
use App\Models\saida_fins;
use Illuminate\Http\Request;


class FinanceiroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ==========================================================================
    public function index(Request $request)
    {
        $session = $request->session()->get("permissions");
        if ($session == null || $session == 2 || $session == 5) {
            return redirect()->route('home');
        }

        $entradaFinanceiro = entrada_fins::orderByDesc('created_at')->with('User')->get();
        $saidaFinanceiro = saida_fins::orderByDesc('created_at')->with('users')->get();
        


        return view ('financeiro.index', [

            'entradas'       => $entradaFinanceiro,
            'saidas'         => $saidaFinanceiro,
            'permission'    => $session
        ]);
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
