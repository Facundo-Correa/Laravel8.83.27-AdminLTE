<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuecesTipoCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jueces_tipo_categoria', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('juez_cod')->nullable();
            $table->integer('tipo_cod')->nullable();
            $table->integer('categoria_cod')->nullable();
            $table->date('juez_fecha_inicio')->nullable();
            $table->date('juez_fecha_baja')->nullable();
            $table->integer('juez_nro_acta')->nullable();
            $table->integer('juez_zona')->nullable();
            $table->string('juez_acta_baja')->nullable();
                        
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
        Schema::dropIfExists('jueces_tipo_categoria');
    }
}
