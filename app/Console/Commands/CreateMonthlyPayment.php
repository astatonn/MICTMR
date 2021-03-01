<?php

namespace App\Console\Commands;

use App\Models\mensalidades;
use App\Models\User;
use Illuminate\Console\Command;

class CreateMonthlyPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlypayment:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a pending monthly fees for users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('loja_id','1')->where('situacao', '1')->get();
        $mensalidades = mensalidades::whereRaw("YEAR(`mensalidades`.`created_at`) = YEAR(NOW())")->whereRaw("MONTH(`mensalidades`.`created_at`) = MONTH(NOW())")->get();
        
        if($mensalidades->count() == 0){
            mensalidades::whereRaw("YEAR(`mensalidades`.`created_at`) = YEAR(NOW())")->whereRaw("MONTH(`mensalidades`.`created_at`) = MONTH(NOW())")->delete();

            $criaMensalidade = new mensalidades();
            foreach ($users as $user){
                $criaMensalidade->status = 0; /* 0 = NÃO PAGO | 1 = PAGO */
                $criaMensalidade->referencia = date('Y').date('m').'01';
                $criaMensalidade->user_id = $user->id;
                $criaMensalidade->save();
            }   
        }
    }
}
