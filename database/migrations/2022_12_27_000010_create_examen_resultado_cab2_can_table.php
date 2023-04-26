<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResultadoCab2CanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_resultado_cab2_can';

    /**
     * Run the migrations.
     * @table examen_resultado_cab2_can
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_nro_control')->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('can_codigo', 45)->nullable();
            $table->string('dcf_resultado_grado', 45)->nullable();
            $table->string('dcf_resultado_calificacion', 45)->nullable();
            $table->string('cab2_guia_nombre', 45)->nullable();
            $table->string('cab2_pri_1', 45)->nullable();
            $table->string('cab2_pri_2', 45)->nullable();
            $table->string('cab2_pri_3', 45)->nullable();
            $table->string('cab2_pri_4', 45)->nullable();
            $table->string('cab2_pri_5', 45)->nullable();
            $table->string('cab2_seg_6', 45)->nullable();
            $table->string('cab2_seg_7', 45)->nullable();
            $table->string('cab2_seg_8', 45)->nullable();
            $table->string('cab2_resultado', 45)->nullable();
            $table->string('cab2_calificacion', 45)->nullable();
            $table->integer('cab2_juez')->nullable();
            $table->string('cab2_figurante', 45)->nullable();
            $table->integer('cab2_habilitado')->nullable();
            $table->integer('cab2_revista')->nullable();
            $table->integer('cab2_internet')->nullable();

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
