<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciaNacimientoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'denuncia_nacimiento';

    /**
     * Run the migrations.
     * @table denuncia_nacimiento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('dn_nro_de_control')->nullable();
            $table->integer('dn_nro_dnu_ser')->nullable();
            $table->date('dn_fecha_tramite')->nullable();
            $table->date('dn_fecha_nacimiento')->nullable();
            $table->integer('dn_cliente_cod')->nullable();
            $table->integer('dn_cliente_tipo_tratamiento')->nullable();
            $table->float('dn_nro_fact')->nullable();
            $table->string('dn_concepto_codigo_pla', 5)->nullable();
            $table->float('dn_concepto_valor')->nullable();
            $table->float('dn_ndebito_valor')->nullable();
            $table->float('dn_credito_valor')->nullable();
            $table->string('dn_can_codigo_letra_macho', 5)->nullable();
            $table->integer('dn_can_codigo_numero_macho')->nullable();
            $table->string('dn_can_codigo_letra_hembra', 5)->nullable();
            $table->integer('dn_can_codigo_numero_hembra')->nullable();
            $table->string('dn_can_domicilio_hembra', 45)->nullable();
            $table->string('dn_can_telefono_hembra', 45)->nullable();
            $table->string('dn_can_localidad_hembra', 45)->nullable();
            $table->integer('dn_zona_hembra')->nullable();
            $table->integer('dn_criadero_cod')->nullable();
            $table->integer('dn_tatuador_cod')->nullable();
            $table->integer('dn_cant_crias_nacidas_macho')->nullable();
            $table->integer('dn_cant_crias_nacidas_hembra')->nullable();
            $table->integer('dn_cant_crias_nacidas_muertas_macho')->nullable();
            $table->integer('dn_cant_crias_nacidas_muertas_hembras')->nullable();
            $table->integer('dn_cantidad_crias_sacrificadas_macho')->nullable();
            $table->integer('dn_cantidad_crias_sacrificadas_hembra')->nullable();
            $table->string('dn_observ', 100)->nullable();
            $table->string('dn_observ_del_parto', 100)->nullable();
            $table->string('dn_inspeccion_solicitante', 45)->nullable();
            $table->string('dn_inspeccion_ejecutante', 45)->nullable();
            $table->date('dn_inspeccion_fecha')->nullable();
            $table->integer('dn_condicional')->nullable();
            $table->integer('dn_datcodusuario')->nullable();
            $table->string('dn_documento_pla', 5)->nullable();
            $table->integer('dn_cliente_agrup_cod')->nullable();
            $table->integer('dn_cod_tramite')->nullable();
            $table->date('dn_ic_fecha_tramite')->nullable();
            $table->date('dn_ic_fecha_inscripcion')->nullable();
            $table->integer('dn_ic_cant_crias_sobrevivientes_macho')->nullable();
            $table->integer('dn_ic_cant_crias_sobrevivientes_hembra')->nullable();
            $table->integer('dn_ic_pendiente_alta_cria')->nullable();
            $table->integer('dn_ic_datcodusuario')->nullable();
            $table->integer('dn_ic_condicional')->nullable();
            $table->float('dn_ic_nro_fact')->nullable();
            $table->string('dn_ic_concepto_codigo_pla', 10)->nullable();
            $table->float('dn_ic_concepto_valor')->nullable();
            $table->float('dn_ic_ndebito_valor')->nullable();
            $table->float('dn_ic_ncredito_valor')->nullable();
            $table->string('dn_ic_documento_pla', 10)->nullable();
            $table->integer('dn_ic_cliente_agrup_cod')->nullable();
            $table->string('dn_ic_imprimi', 45)->nullable();
            $table->string('dn_imprimi', 2)->nullable();
            $table->integer('dn_ic_cod_tramite')->nullable();
            $table->string('dn_revista', 2)->nullable();
            $table->string('dn_internet', 2)->nullable();

            $table->unique(["id"], 'id_UNIQUE');

            $table->index(["dn_nro_dnu_ser"], 'dn_nro_dnu_ser_UNIQUE');
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
