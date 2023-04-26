<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTatuadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatuador', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tatuador_cod')->nullable();
            $table->integer('tatuador_cliente_cod')->nullable();
            $table->string('tatuador_clave')->nullable();
            $table->string('tatuador_nro')->nullable();
            $table->date('tatuador_fechainicio')->nullable();
            $table->date('tatuador_fechabaja')->nullable();
            $table->string('tatuador_nro_acta')->nullable();
            $table->integer('tatuador_ult_num')->nullable();
            $table->integer('tatuador_acta_baja')->nullable();
            $table->integer('tatuador_zona')->nullable();
                        
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
        Schema::dropIfExists('tatuador');
    }
}
