<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosAdiestramientoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resultados_adiestramiento';

    /**
     * Run the migrations.
     * @table resultados_adiestramiento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('calendario_id')->nullable();
            $table->string('prueba_codigo', 45)->nullable();
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->date('fecha_prueba')->nullable();
            $table->integer('puesto')->nullable();
            $table->string('calificacion_codigo', 10)->nullable();
            $table->float('puntaje')->nullable();
            $table->string('guia', 45)->nullable();
            $table->string('peludo', 2)->nullable();
            $table->float('puntajea')->nullable();
            $table->float('puntajeb')->nullable();
            $table->float('puntajec')->nullable();

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
