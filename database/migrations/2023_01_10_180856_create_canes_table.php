<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'canes';

    /**
     * Run the migrations.
     * @table canes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('can_codigo_letra', 10)->nullable();
            $table->integer('can_codigo_numero')->nullable();
            $table->string('can_codigo_extranjero')->nullable();
            $table->integer('can_nro_extranjero')->nullable();
            $table->string('can_nombre', 45)->nullable();
            $table->string('can_apellido', 45)->nullable();
            $table->string('can_madre_letra', 10)->nullable();
            $table->integer('can_madre_numero')->nullable();
            $table->string('can_madre_nombre', 45)->nullable();
            $table->string('can_padre_letra', 10)->nullable();
            $table->integer('can_padre_numero')->nullable();
            $table->string('can_padre_nombre', 45)->nullable();
            $table->integer('can_dn_nro_denu_ser')->nullable();
            $table->date('can_fecha_nacimiento')->nullable();
            $table->string('can_sexo', 2)->nullable();
            $table->string('can_color')->nullable();
            $table->string('can_senias')->nullable();
            $table->string('can_peludo')->nullable();
            $table->integer('can_criadero_codigo')->nullable();
            $table->integer('can_servicios_fertiles')->nullable();
            $table->integer('can_servicios_informados')->nullable();
            $table->integer('can_cantidad_crias_permitidas')->nullable();
            $table->integer('can_crias_registradas')->nullable();
            $table->integer('can_emision_pedigree')->nullable();
            $table->integer('can_agrupacion_compite')->nullable();
            $table->integer('can_nro_transferencia')->nullable();
            $table->string('can_dcf_grado')->nullable();
            $table->string('can_dcf_calificacion')->nullable();
            $table->string('can_dcfcodo_grado')->nullable();
            $table->string('can_dcfcodo_calificacion', 45)->nullable();
            $table->string('can_seleccion_clase')->nullable();
            $table->integer('can_seleccion_cantser')->nullable();
            $table->date('can_seleccion_fvto')->nullable();
            $table->string('can_seleccion_validez')->nullable();
            $table->string('can_cab2', 45)->nullable();
            $table->string('can_apto')->nullable();
            $table->string('can_examen_superior', 2)->nullable();
            $table->string('can_cambio_residencia', 255)->nullable();
            $table->date('can_fecha_alta')->nullable();
            $table->date('can_fecha_defuncion')->nullable();
            $table->string('can_embargado', 2)->nullable();
            $table->string('can_perdido', 2)->nullable();
            $table->longtext('can_observaciones')->nullable();
            $table->date('can_fecha_agrupacion_compite')->nullable();
            $table->string('can_padre_extranjero', 2)->nullable();
            $table->string('can_pdi')->nullable();
            $table->string('can_PDIimp')->nullable();

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
