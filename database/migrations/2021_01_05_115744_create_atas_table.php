<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atas', function (Blueprint $table) {
            $table->id();
            $table->date('referencia');
            $table->timestamps();

        });

        // CRIA RELACIONAMENTO DE MUITOS PARA MUITOS
        Schema::create('ata_user', function (Blueprint $table){
            $table->id();
            $table->bigInteger('ata_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();

            $table->foreign('ata_id')
                    ->references('id')
                    ->on('atas');
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
        Schema::dropIfExists('atas');
        Schema::dropIfExists('ata_user');
    }
}
