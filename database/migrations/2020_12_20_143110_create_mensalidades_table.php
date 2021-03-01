<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->date('referencia');
            $table->timestamps();

            // RELACIONAMENTO DAS TABELAS
            $table->unsignedBigInteger('user_id'); 
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensalidades');
    }
}
