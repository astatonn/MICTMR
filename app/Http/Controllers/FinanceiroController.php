<?php

namespace App\Http\Controllers;

use App\Models\entrada_fins;
use App\Models\mensalidades;
use App\Models\saida_fins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // CONSULTA DE TODOS OS REGISTROS
        $entradaFinanceiro  = entrada_fins::orderByDesc('created_at')->with('User')->get(); // 
        $saidaFinanceiro    = saida_fins::orderByDesc('created_at')->with('users')->get();

        // SOMA TOTAL DE VALORES DO ANO
        $valorTotalEntradaAno   = entrada_fins::totalAno();
        $valorTotalSaidaAno     = saida_fins::totalAno();

        // BALANÇO PATRIMONIAL
        $totalEntrada   = entrada_fins::sum('valor');
        $totalSaida     = saida_fins::sum('valor');
        $balanco        = $totalEntrada - $totalSaida;

        
        $entradasPorMes = entrada_fins::divididoAnoMes();  
        
        $saidasPorMes = saida_fins::divididoAnoMes();
    
        
        // CONTROLE DE MENSALIDADES
        // command criado para criar automaticamente as linhas no banco->php artisan monthlypayment:create
        
        $mensalidadesAgrupadas = entrada_fins::mensalidades();
        


        

        // $faltaMensalidadeMes = mensalidades::whereRaw("YEAR(`mensalidades`.`referencia`) = YEAR(NOW())")->whereRaw("MONTH(`mensalidades`.`referencia`) = MONTH(NOW())")->where('status','0');
        return view ('financeiro.index', compact ('entradaFinanceiro', 'saidaFinanceiro', 'valorTotalEntradaAno', 'valorTotalSaidaAno', 'session', 'saidasPorMes', 'entradasPorMes', 'balanco', 'mensalidadesAgrupadas' ));

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
