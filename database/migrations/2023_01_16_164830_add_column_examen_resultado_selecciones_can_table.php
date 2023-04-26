<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnExamenResultadoSeleccionesCanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_resultado_selecciones_can', function (Blueprint $table) {
            $table->longtext('seleccion_fir_metacampos')->nullable();
            $table->string('seleccion_frente', 45)->nullable();
            $table->string('seleccion_grupa', 45)->nullable();
            $table->string('seleccion_cola', 45)->nullable();
            $table->string('seleccion_fir_de_corvejones', 45)->nullable();
            $table->longtext('Seleccion_caminando_de_frente')->nullable();
            $table->longtext('Seleccion_caminando_por_detras')->nullable();
            $table->string('seleccion_corvejones', 45)->nullable();
            $table->string('Seleccion_pisadaenformade', 45)->nullable();
            $table->longtext('seleccion_trote')->nullable();
            $table->string('seleccion_pasadas_ant', 45)->nullable();
            $table->string('seleccion_pasadas_post', 45)->nullable();
            $table->string('seleccion_propulsion', 45)->nullable();
            $table->string('seleccion_actitud', 45)->nullable();
            $table->string('seleccion_atencion', 45)->nullable();
            $table->string('seleccion_nervios', 45)->nullable();
            $table->string('seleccion_caracter', 45)->nullable();
            $table->string('seleccion_reaccion_al_tiro', 45)->nullable();
            $table->string('seleccion_firmeza_ataque', 45)->nullable();
            $table->string('seleccion_coraje', 45)->nullable();
            $table->string('seleccion_espiritu_de_lucha', 45)->nullable();
            $table->longtext('seleccion_apariencia_del_ejemplar')->nullable();
            $table->longtext('seleccion_examen_de_displasia')->nullable();
            $table->longtext('seleccion_recomendacion_para_reproduccion')->nullable();
            $table->string('seleccion_razon_de_rechazo_temporario', 45)->nullable();
            $table->string('seleccion_validez', 45)->nullable();
            $table->integer('seleccion_juez')->nullable();
            $table->integer('seleccion_revista')->nullable();
            $table->integer('seleccion_internet')->nullable();
            $table->longtext('seleccion_grupaobservaciones')->nullable();
            $table->string('Seleccion_AplomosVistisdeFrente', 45)->nullable();
            $table->string('Seleccion_AplomosVistisdeAtras', 45)->nullable();
            $table->string('seleccion_alcance', 45)->nullable();
            $table->string('seleccion_firmezadorsal', 45)->nullable();
            $table->string('seleccion_mordida', 45)->nullable();
            $table->string('seleccion_enrazonde', 45)->nullable();
            $table->string('Seleccion_AspectoSanitarioyGral', 45)->nullable();
            $table->string('seleccion_tipicidad', 45)->nullable();
            $table->string('seleccion_cruz', 45)->nullable();
            $table->longtext('seleccion_lineainferior')->nullable();
            $table->string('seleccion_firmeza_de_codos', 45)->nullable();
            $table->string('seleccion_formulario', 45)->nullable();
            $table->string('dcfcodo_resultado_grado', 45)->nullable();
            $table->string('dcfcodo_resultado_clasificacion', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
