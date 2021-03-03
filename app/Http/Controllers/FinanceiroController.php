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
        $valorTotalEntradaAno   = entrada_fins::whereRaw("YEAR(`entrada_fins`.`created_at`) = YEAR(NOW())")->sum('valor');
        $valorTotalSaidaAno     = saida_fins::whereRaw("YEAR(`saida_fins`.`created_at`) = YEAR(NOW())")->sum('valor');

        // BALANÇO PATRIMONIAL
        $totalEntrada   = entrada_fins::sum('valor');
        $totalSaida     = saida_fins::sum('valor');
        $balanco = $totalEntrada - $totalSaida;

        // COLEÇÃO DE DADOS COM VALORES SEPARADOS POR TIPO NO MES
        $entradas = collect(DB::select('SELECT tipo,SUM(valor) as valor, YEAR(created_at) as ano, MONTH(created_at) as mes
        FROM entrada_fins
        GROUP BY YEAR(created_at), MONTH(created_at), tipo
        ORDER BY YEAR(created_at) DESC, MONTH (created_at) DESC
        '))->groupBy('ano');

        foreach($entradas as $key=> $s){
            $entradasPorMes[]=($entradas[$key]->groupBy('mes'));      
        }

        $saidas = collect(DB::select('SELECT tipo,SUM(valor) as valor, YEAR(created_at) as ano, MONTH(created_at) as mes
        FROM saida_fins
        GROUP BY YEAR(created_at), MONTH(created_at), tipo
        ORDER BY YEAR(created_at) DESC, MONTH (created_at) DESC
        '))->groupBy('ano');

        foreach($saidas as $key=> $s){
            $saidasPorMes[]=($saidas[$key]->groupBy('mes'));      
        }

        
        
        
        // CONTROLE DE MENSALIDADES
        // command criado para criar automaticamente as linhas no banco->php artisan monthlypayment:create
        $mensalidades = collect(DB::select('SELECT users.name, users.grau, YEAR(mensalidades.created_at) as ano, MONTH(mensalidades.created_at) as mes, mensalidades.user_id, mensalidades.status
        FROM mensalidades
        LEFT JOIN users
        ON mensalidades.user_id = users.id
        GROUP BY YEAR(mensalidades.created_at), MONTH(mensalidades.created_at), user_id
        ORDER BY YEAR(mensalidades.created_at) DESC, MONTH (mensalidades.created_at) DESC
        '))->groupBy('ano');

        foreach($mensalidades as $key=> $s){
            $mensalidadesAgrupadas[]=($mensalidades[$key]->groupBy('mes'));      
        }
        dd ($mensalidadesAgrupadas);

        // $faltaMensalidadeMes = mensalidades::whereRaw("YEAR(`mensalidades`.`referencia`) = YEAR(NOW())")->whereRaw("MONTH(`mensalidades`.`referencia`) = MONTH(NOW())")->where('status','0');
        
        
        return view ('financeiro.index', [

            'listaEntradas'         => $entradaFinanceiro,
            'listaSaidas'           => $saidaFinanceiro,
            'totalEntradaAno'           => $valorTotalEntradaAno,
            'totalSaidaAno'             => $valorTotalSaidaAno,
            'permission'        => $session,
            'saidasPorMes'              => $saidasPorMes,
            'entradasPorMes'            => $entradasPorMes,
            'mensalidades'          => $mensalidades,
            'balancoPatrimonial'    => $balanco
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
