<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResultadoAptocriaCanTable extends Migration
{
    //Al ser muchas columnas en esta tabla, por un tema de configuración, dividí
    //la tabla a la mitad, esta parte va a crear la tabla con la mitad de las columnas
    //y luego se le hace un ADD_COLUMN con la otra mitad de las columnas a esta tabla

    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_resultado_aptocria_can';

    /**
     * Run the migrations.
     * @table examen_resultado_aptocria_can
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_nro_control')->nullable();
            $table->string('can_codigo', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('dcf_resultado_grado', 45)->nullable();
            $table->string('dc_resultado_calificacion', 45)->nullable();
            $table->string('apto_alzada')->nullable();
            $table->string('apto_cierre')->nullable();
            $table->string('apto_dentadura')->nullable();
            $table->longtext('apto_informe')->nullable();
            $table->string('apto_tiro')->nullable();
            $table->string('apto_ataque', 45)->nullable();
            $table->string('apto_vara')->nullable();
            $table->string('apto_apto')->nullable();
            $table->integer('apto_cantidad_servicios')->nullable();
            $table->integer('apto_calificacion')->nullable();
            $table->longtext('apto_observaciones')->nullable();
            $table->integer('apto_codjuez_veedor')->nullable();
            $table->integer('apto_codhabilitado_veedor')->nullable();
            $table->string('apto_revista', 45)->nullable();
            $table->string('apto_internet', 45)->nullable();

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
