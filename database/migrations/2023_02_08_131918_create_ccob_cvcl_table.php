<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobCvclTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_cvcl', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('CVCL_DIVISION_CVCL')->nullable();
            $table->string('CVCL_SUCURSAL_IMP')->nullable();
            $table->string('CVCL_TIPO_VAR')->nullable();
            $table->string('CVCL_NUMERO_CVCL')->nullable();
            $table->string('CVCL_CLIENTE')->nullable();
            $table->string('CVCL_FECHA_EMI')->nullable();
            $table->string('CVCL_FECHA_BAJA')->nullable();
            $table->string('CVCL_ORIGEN')->nullable();
            $table->string('CVCL_REFERENCIA_1')->nullable();
            $table->string('CVCL_REFERENCIA_2')->nullable();
            $table->string('CVCL_FECHA_IMPRESO')->nullable();
            $table->string('CVCL_CLASIF_NPCV_1')->nullable();
            $table->string('CVCL_CLASIF_NPCV_2')->nullable();
            $table->string('CVCL_CLASIF_NPCV_3')->nullable();
            $table->string('CVCL_CLASIF_NPCV_4')->nullable();
            $table->string('CVCL_CLASIF_NPCV_5')->nullable();
            $table->string('CVCL_CLASIF_NPCV_6')->nullable();
            $table->string('CVCL_IMP_FISCAL')->nullable();
            $table->string('CVCL_NUMERO_CAI')->nullable();
            $table->string('CVCL_FECHA_VTO_CAI')->nullable();
            $table->string('CVCL_OPER_NGV_AFIP')->nullable();
            $table->string('CVCL_CALCGR_IMP_IT')->nullable();
            $table->string('CVCL_NUMERADOR')->nullable();
            $table->string('CVCL_INC_MULTINODO')->nullable();
            $table->string('CVCL_NODO_ORIGEN')->nullable();
            $table->string('CVCL_ES_ND_INTERES')->nullable();
            $table->string('CVCL_TIPO_CALC_INT')->nullable();
            $table->string('CVCL_TASA_INT_MES')->nullable();
            $table->string('CVCL_NUFEC_VTO_INT')->nullable();
            $table->string('CVCL_NUFEC_VTO_FIN')->nullable();
            $table->string('CVCL_REF_PREF_DEPU')->nullable();
            $table->string('CVCL_FEC_ENT_VAL')->nullable();
            $table->string('CVCL_ECM_FH_ENVIO')->nullable();
            $table->string('CVCL_ES_CPBTE_ELECTRONICO')->nullable();
            $table->string('CVCL_ESTADO_CPBTE_ELEC')->nullable();
            $table->string('CVCL_ES_PREST_SERVICIOS')->nullable();
            $table->string('CVCL_FECHA_DES_PREST_SERVICIOS')->nullable();
            $table->string('CVCL_FECHA_HAS_PREST_SERVICIOS')->nullable();
            $table->string('CVCL_OBS_AUT_CPBTE_ELEC')->nullable();
            $table->string('CVCL_NRO_LOTE_AUT_CPBTE_ELEC_WS')->nullable();
            $table->string('CVCL_CLASE_CPBTE_ACER')->nullable();
            $table->string('CVCL_CLASE_FONC')->nullable();
            $table->string('CVCL_LIQ_ACOPIO_PARC_FIN')->nullable();
            $table->string('CVCL_FEC_PROCESO_CAE')->nullable();
            $table->string('CVCL_CLASE_CPBTE_VTA_ACOPIO')->nullable();
            $table->string('CVCL_NUMINT_PACA')->nullable();
            $table->string('CVCL_COE_MODO_AUTORIZACION')->nullable();
            $table->string('CVCL_COE')->nullable();
            $table->string('CVCL_COE_ESTADO')->nullable();
            $table->string('CVCL_COE_FECHA_ANULACION')->nullable();
            $table->string('CVCL_COE_FECHA_AUTORIZACION')->nullable();
            $table->string('CVCL_CAMPO_OPCIONAL_FE')->nullable();

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
        Schema::dropIfExists('ccob_cvcl');
    }
}
