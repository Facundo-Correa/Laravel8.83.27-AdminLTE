<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResultadoSeleccionesCanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_resultado_selecciones_can';

    /**
     * Run the migrations.
     * @table examen_resultado_selecciones_can
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
            $table->string('DCF_Resultado_Calificacion', 45)->nullable();
            $table->string('cab2_resultado', 45)->nullable();
            $table->string('cab2_clasificacion', 45)->nullable();
            $table->string('seleccion_tiro', 45)->nullable();
            $table->string('seleccion_ataque', 45)->nullable();
            $table->date('Seleccion_fecha_vencimiento')->nullable();
            $table->string('seleccion_nro_acta')->nullable();
            $table->string('seleccion_clase')->nullable();
            $table->string('Seleccion_Altur_de_Cruz', 45)->nullable();
            $table->string('seleccion_prof_pecho', 45)->nullable();
            $table->string('seleccion_circunf_pecho', 45)->nullable();
            $table->string('seleccion_peso', 45)->nullable();
            $table->string('seleccion_color', 45)->nullable();
            $table->string('seleccion_senias', 45)->nullable();
            $table->string('Seleccion_Picmentacion', 45)->nullable();
            $table->string('seleccion_pelaje', 45)->nullable();
            $table->string('seleccion_testiculo', 45)->nullable();
            $table->string('seleccion_unias', 45)->nullable();
            $table->string('seleccion_conformacion_cabeza', 45)->nullable();
            $table->string('seleccion_ojo', 45)->nullable();
            $table->string('seleccion_maxilar_sup', 45)->nullable();
            $table->string('seleccion_maxilar_inf', 45)->nullable();
            $table->string('seleccion_stop', 45)->nullable();
            $table->string('seleccion_oreja', 45)->nullable();
            $table->string('seleccion_dentadura', 45)->nullable();
            $table->longtext('seleccion_mordedura')->nullable();
            $table->longtext('seleccion_fallas_dentarias')->nullable();
            $table->longtext('seleccion_observacion')->nullable();
            $table->string('Seleccion_Exp_Sexo', 45)->nullable();
            $table->string('seleccion_constitucion', 45)->nullable();
            $table->string('seleccion_expresion', 45)->nullable();
            $table->string('seleccion_conformacion', 45)->nullable();
            $table->string('seleccion_musculatura', 45)->nullable();
            $table->string('seleccion_fir_lig_ant', 45)->nullable();
            $table->string('seleccion_fir_lig_post', 45)->nullable();
            $table->string('seleccion_dorso', 45)->nullable();
            $table->string('seleccion_ang_ant', 45)->nullable();
            $table->string('seleccion_ang_post', 45)->nullable();
            $table->string('seleccion_fir_codos', 45)->nullable();

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
