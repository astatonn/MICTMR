<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('permissions')->nullable(); // REFERE-SE AS PERMISSÕES DE ACESSO DO USUÁRIO
            $table->rememberToken();
            // $table->foreignId('loja_id')->constrained('lojas'); // RELACIONAMENTO DA TABELA
            $table->timestamps();

            // RELACIONAMENTO DAS TABELAS
            $table->bigInteger('loja_id')
            ->unsigned()
            ->index(); 
            
            $table->foreign('loja_id')
                  ->references('id')
                  ->on('lojas');
        });
        /*

        1 = ADMIN
        2 = USUÁRIO CONVENCIONAL
        3 = TESOUREIRO
        4 = VENERÁVEL MESTRE
        5 = SECRETÁRIO

        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
