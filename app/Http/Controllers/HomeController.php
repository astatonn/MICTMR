<?php

namespace App\Http\Controllers;

use App\Models\entrada_fins;
use App\Models\mensalidades;
use App\Models\saida_fins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
// ==============================DADOS PARA DASHBOARD =============================


        // $mensalidades = DB::select('SELECT users.name, users.grau, mensalidades.status
        // FROM mensalidades
        // LEFT JOIN users
        
        // ON mensalidades.user_id = users.id
        // WHERE YEAR(`mensalidades`.`created_at`) = YEAR(NOW())
        // AND MONTH(`mensalidades`.`created_at`) = MONTH(NOW())
        // ORDER BY YEAR(mensalidades.created_at) DESC, MONTH (mensalidades.created_at) DESC');

        // $totalEntrada   = entrada_fins::sum('valor');
        // $totalSaida     = saida_fins::sum('valor');
        // $balanco = $totalEntrada - $totalSaida;

        // $entradas = collect(DB::select('SELECT tipo,SUM(valor) as valor, YEAR(created_at) as ano, MONTH(created_at) as mes
        // FROM entrada_fins
        // WHERE YEAR(`mensalidades`.`created_at`) = YEAR(NOW())
        // AND MONTH(`mensalidades`.`created_at`) = MONTH(NOW())
        // ORDER BY YEAR(created_at) DESC, MONTH (created_at) DESC
        // '))->groupBy('tipo');

        return view('home');
    }

 
}
