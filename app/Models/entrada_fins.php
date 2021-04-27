<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class entrada_fins extends Model
{
    protected $table = "entrada_fins";

    public function User()
    {
        
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public static function divididoAnoMes(){

        $entradas = collect(DB::select('SELECT tipo,SUM(valor) as valor, YEAR(created_at) as ano, MONTH(created_at) as mes
        FROM entrada_fins
        GROUP BY YEAR(created_at), MONTH(created_at), tipo
        ORDER BY YEAR(created_at) DESC, MONTH (created_at) DESC
        '))->groupBy('ano');


        if ($entradas){
            foreach($entradas as $key=> $s){
                $entradasPorMes[]=($entradas[$key]->groupBy('mes'));      
            }

            
            return $entradasPorMes;

        }
        else {
            return null;
        }
    }

    public static function totalAno (){
        $valorTotal = entrada_fins::whereRaw("YEAR(`entrada_fins`.`created_at`) = YEAR(NOW())")->sum('valor');
        
        if ($valorTotal){
            return $valorTotal;
        }
        else {
            return '0';
        }
    }

    public static function mensalidades(){
        $mensalidades = collect(DB::select('SELECT users.name, users.grau, YEAR(mensalidades.created_at) as ano, MONTH(mensalidades.created_at) as mes, mensalidades.user_id, mensalidades.status
        FROM mensalidades
        LEFT JOIN users
        ON mensalidades.user_id = users.id
        GROUP BY YEAR(mensalidades.created_at), MONTH(mensalidades.created_at), user_id
        ORDER BY YEAR(mensalidades.created_at) DESC, MONTH (mensalidades.created_at) DESC
        '))->groupBy('ano');
        if ($mensalidades->count()){
            foreach($mensalidades as $key=> $s){
                $mensalidadesAgrupadas[$key]=($mensalidades[$key]->groupBy('mes'));      
            }
            
            return $mensalidadesAgrupadas;
        }
        else {
            return null;
        }
        
    }
}
