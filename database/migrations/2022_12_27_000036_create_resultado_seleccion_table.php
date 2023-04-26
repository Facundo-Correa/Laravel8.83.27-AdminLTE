<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoSeleccionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resultado_seleccion';

    /**
     * Run the migrations.
     * @table resultado_seleccion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('resultado_seleccion_codigo')->nullable();
            $table->string('resultado_seleccion_descripcion', 45)->nullable();
            $table->string('Resultado_seleccion_es_recahazada', 2)->nullable();
            $table->integer('resultado_seleccion_cantidad_servicios')->nullable();

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
        Schema::dropIfExists($this->tableName);
    }
}
