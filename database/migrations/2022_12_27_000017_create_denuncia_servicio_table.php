<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciaServicioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'denuncia_servicio';

    /**
     * Run the migrations.
     * @table denuncia_servicio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ds_nro_de_control')->nullable();
            $table->integer('ds_nro_denu_ser')->nullable();
            $table->date('ds_fecha_tramite')->nullable();
            $table->integer('ds_cliente_cod')->nullable();
            $table->integer('ds_nro_form')->nullable();
            $table->date('ds_fecha_servicio')->nullable();
            $table->string('ds_cliente_tipo_tratamiento', 45)->nullable();
            $table->float('ds_nro_fact')->nullable();
            $table->string('ds_concepto_codigo_pla', 45)->nullable();
            $table->float('ds_concepto_valor')->nullable();
            $table->date('ds_vf_fecha')->nullable();
            $table->integer('ds_vf_nro_fact')->nullable();
            $table->integer('ds_tm')->nullable();
            $table->float('ds_tm_nro_fact')->nullable();
            $table->date('ds_tm_fecha_tramite')->nullable();
            $table->string('ds_can_codigo_letra_macho', 5)->nullable();
            $table->integer('ds_can_codigo_numero_macho')->nullable();
            $table->string('ds_can_codigo_letra_hembra', 5)->nullable();
            $table->integer('ds_can_codigo_numero_hembra')->nullable();
            $table->string('ds_can_domicilio_hembra', 45)->nullable();
            $table->string('ds_can_telefono_hembra', 45)->nullable();
            $table->string('ds_can_localidad_hembra', 45)->nullable();
            $table->integer('ds_criadero_cod')->nullable();
            $table->string('ds_observ', 100)->nullable();
            $table->string('ds_observ_apto', 100)->nullable();
            $table->string('ds_observ_arrendamiento', 100)->nullable();
            $table->string('ds_observ_firmas', 100)->nullable();
            $table->string('ds_observ_registro_criadero', 100)->nullable();
            $table->string('ds_observ_cosang', 100)->nullable();
            $table->string('ds_observ_edad', 100)->nullable();
            $table->string('ds_baja_logica_cod', 45)->nullable();
            $table->string('ds_baja_logica_observ', 100)->nullable();
            $table->integer('ds_condicional')->nullable();
            $table->integer('datcodusuario')->nullable();
            $table->string('ds_imprimi', 2)->nullable();
            $table->string('ds_documento_pla', 5)->nullable();
            $table->integer('ds_cliente_agrup_cod')->nullable();
            $table->string('ds_cod_tramite', 10)->nullable();
            $table->string('ds_grabe_talon', 2)->nullable();
            $table->string('ds_revista', 2)->nullable();
            $table->string('ds_internet', 2)->nullable();
            $table->string('ds_peludo', 2)->nullable();

            $table->unique(["id"], 'id_UNIQUE');

            $table->index(["ds_nro_denu_ser"], 'ds_nro_denu_ser_UNIQUE');
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
