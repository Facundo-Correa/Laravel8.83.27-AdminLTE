<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobCtecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_ctec', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('CTEC_CTACTE_CTEC')->nullable();
            $table->string('CTEC_ORIGEN')->nullable();
            $table->string('CTEC_DIVISION')->nullable();
            $table->string('CTEC_SUCURSAL_IMP')->nullable();
            $table->string('CTEC_SUCURSAL_EMP')->nullable();
            $table->string('CTEC_CLIENTE')->nullable();
            $table->string('CTEC_CLIENTE_VENTA')->nullable();
            $table->string('CTEC_FECHA_EMI')->nullable();
            $table->string('CTEC_CONDICION_IVA')->nullable();
            $table->string('CTEC_DISCRIMIN_IMP')->nullable();
            $table->string('CTEC_LETRA')->nullable();
            $table->string('CTEC_COND_PAGO')->nullable();
            $table->string('CTEC_SIGNO')->nullable();
            $table->string('CTEC_ES_DIF_CAMBIO')->nullable();
            $table->string('CTEC_DESCRIPCION')->nullable();
            $table->string('CTEC_MONEDA')->nullable();
            $table->string('CTEC_COTIZACION')->nullable();
            $table->string('CTEC_IMP_BRU_ORI')->nullable();
            $table->string('CTEC_IMP_BRU_LOC')->nullable();
            $table->string('CTEC_IMP_TOT_ORI')->nullable();
            $table->string('CTEC_IMP_TOT_LOC')->nullable();
            $table->string('CTEC_FECHA_PROX_GC')->nullable();
            $table->string('CTEC_ORIGEN_CVCL')->nullable();
            $table->string('CTEC_GESTION_COBR')->nullable();
            $table->string('CTEC_EST_CC_CTACTE')->nullable();
            $table->string('CTEC_FEC_CC_CTACTE')->nullable();
            $table->string('CTEC_IMP_CC_CTACTE')->nullable();
            $table->string('CTEC_OBS_CC_CTACTE')->nullable();
            $table->string('CTEC_HORA_PROX_GC')->nullable();

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
        Schema::dropIfExists('ccob_ctec');
    }
}
