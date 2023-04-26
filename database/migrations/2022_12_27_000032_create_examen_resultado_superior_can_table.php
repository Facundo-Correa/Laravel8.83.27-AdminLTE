<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResultadoSuperiorCanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_resultado_superior_can';

    /**
     * Run the migrations.
     * @table examen_resultado_superior_can
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('can_codigo')->nullable();
            $table->integer('can_numero')->nullable();
            $table->integer('examen_nro_control')->nullable();
            $table->string('aprobado_seccion_a', 45)->nullable();
            $table->string('aprobado_seccion_b', 45)->nullable();
            $table->string('aprobado_seccion_c', 45)->nullable();
            $table->string('aprobado_seccion_d', 45)->nullable();
            $table->string('clasificacion_seccion_a', 45)->nullable();
            $table->string('clasificacion_seccion_b', 45)->nullable();
            $table->string('clasificacion_seccion_c', 45)->nullable();
            $table->integer('puntos_seccion_a')->nullable();
            $table->integer('puntos_seccion_b')->nullable();
            $table->integer('puntos_seccion_c')->nullable();
            $table->integer('total_puntos')->nullable();
            $table->string('guia_nombre', 45)->nullable();
            $table->string('total', 45)->nullable();
            $table->integer('figurante')->nullable();
            $table->integer('marcador')->nullable();
            $table->integer('juez')->nullable();
            $table->integer('sup_revista')->nullable();
            $table->integer('sup_internet')->nullable();

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
