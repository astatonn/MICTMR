<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_fins', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 10, 2);
            $table->string('tipo', 50);
            $table->string('descricao', 200);
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
        Schema::dropIfExists('entrada_fins');
    }
}
