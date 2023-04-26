<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistPciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sist_pcia', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('PCIA_PROVINCIA')->nullable();
            $table->string('PCIA_NOMBRE')->nullable();
            $table->integer('PCIA_UTILIZABLE')->nullable();
            $table->string('PCIA_CODIGO_COT')->nullable();
            $table->string('PCIA_PROVINCIA_ACER')->nullable();
                        
            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sist_pcia');
    }
}
