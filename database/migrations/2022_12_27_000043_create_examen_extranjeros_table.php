<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenExtranjerosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_extranjeros';

    /**
     * Run the migrations.
     * @table examen_extranjeros
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_cod')->nullable();
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->date('examen_fecha')->nullable();
            $table->string('examen_resultado', 45)->nullable();
            $table->string('examen_juez_nombre', 45)->nullable();
            $table->string('examen_pais_cod', 45)->nullable();
            $table->string('examen_seleccion', 2)->nullable();
            $table->string('examen_placa', 2)->nullable();
            $table->string('examen_cab2osuperior', 2)->nullable();
            $table->integer('examen_cantidad_cria')->nullable();
            $table->string('examen_grado', 45)->nullable();
            $table->string('examen_calificacion', 45)->nullable();
            $table->string('examen_sumula', 45)->nullable();
            $table->string('examen_apto', 45)->nullable();
            $table->date('examen_fecha_vto')->nullable();
            $table->string('examen_placacodo', 2)->nullable();

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
