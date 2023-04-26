<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosEstructuraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resultados_estructura';

    /**
     * Run the migrations.
     * @table resultados_estructura
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('calendario_id')->nullable();
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->date('fecha_prueba')->nullable();
            $table->integer('puesto')->nullable();
            $table->string('sexo', 1)->nullable();
            $table->integer('categoria_codigo')->nullable();
            $table->string('calificacion_codigo', 45)->nullable();
            $table->string('guia', 45)->nullable();
            $table->integer('puntaje')->nullable();
            $table->integer('agrupacion')->nullable();
            $table->integer('agrupacion_puntaje')->nullable();
            $table->integer('puesto_final')->nullable();
            $table->integer('categoria_final')->nullable();
            $table->integer('puntaje_final')->nullable();
            $table->string('peludo', 1)->nullable();

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
