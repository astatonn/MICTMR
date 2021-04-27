<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class saida_fins extends Model
{
    
    protected $table = "saida_fins";
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function divididoAnoMes(){

        $saidas = collect(DB::select('SELECT tipo,SUM(valor) as valor, YEAR(created_at) as ano, MONTH(created_at) as mes
        FROM saida_fins
        GROUP BY YEAR(created_at), MONTH(created_at), tipo
        ORDER BY YEAR(created_at) DESC, MONTH (created_at) DESC
        '))->groupBy('ano');


        
        if ($saidas->count()){
            foreach($saidas as $key=> $s){
                $saidasPorMes[$key]=($saidas[$key]->groupBy('mes'));      
            }
            
            return $saidasPorMes;
        }
        else {
            return null;
        }

    }

    public static function totalAno (){
        $valorTotal = saida_fins::whereRaw("YEAR(`saida_fins`.`created_at`) = YEAR(NOW())")->sum('valor');
        
        if ($valorTotal){
            return $valorTotal;
        }
        else {
            return '0';
        }
    }
}
