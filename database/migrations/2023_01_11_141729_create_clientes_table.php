<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('CLIE_CLIENTE')->nullable();
            $table->string('CLIE_NOMBRE', 255)->nullable();
            $table->string('CLIE_NOMBRE_LEGAL', 255)->nullable();
            $table->integer('CLIE_ES_CLI_GLOB')->nullable();
            $table->string('CLIE_DOMICILIO', 255)->nullable();
            $table->string('CLIE_LOCALIDAD', 255)->nullable();
            $table->string('CLIE_COD_POSTAL', 20)->nullable();
            $table->string('CLIE_PROVINCIA', 10)->nullable();
            $table->string('CLIE_PAIS', 10)->nullable();
            $table->string('CLIE_TELEFONO', 50)->nullable();
            $table->string('CLIE_FAX')->nullable();
            $table->string('CLIE_EMAIL', 255)->nullable();
            $table->longText('CLIE_OBSERVACION')->nullable();
            $table->string('CLIE_COD_PROVEEDOR',255)->nullable();
            $table->string('CLIE_REFERENCIA', 255)->nullable();
            $table->string('CLIE_HORA_ATENCION',255)->nullable();
            $table->string('CLIE_HORA_ENTREGA',255)->nullable();
            $table->string('CLIE_CONDICION_IVA', 10)->nullable();
            $table->string('CLIE_CUIT', 30)->nullable();
            $table->string('CLIE_ING_BRUTOS', 255)->nullable();
            $table->string('CLIE_CONTAC_VENTA', 255)->nullable();
            $table->string('CLIE_CONTAC_COBRO', 255)->nullable();
            $table->integer('CLIE_COND_PAGO')->nullable();
            $table->string('CLIE_MONEDA_CTE', 20)->nullable();
            $table->integer('CLIE_CUENTA_CLIE')->nullable();
            $table->integer('CLIE_TIPO_CLI')->nullable();
            $table->integer('CLIE_ACTIVIDAD_CLI')->nullable();
            $table->string('CLIE_CLASIF_1', 40)->nullable();
            $table->string('CLIE_CLASIF_2', 40)->nullable();
            $table->string('CLIE_CLASIF_3', 40)->nullable();
            $table->string('CLIE_CLASIF_4', 40)->nullable();
            $table->integer('CLIE_VENDEDOR')->nullable();
            $table->integer('CLIE_ZONA_VENTA')->nullable();
            $table->integer('CLIE_COBRADOR')->nullable();
            $table->integer('CLIE_FLETE')->nullable();
            $table->integer('CLIE_BLOQUEADO_PED')->nullable();
            $table->integer('CLIE_BLOQUEADO_FAC')->nullable();
            $table->date('CLIE_FECHA_ALTA')->nullable();
            $table->date('CLIE_FECHA_BAJA')->nullable();
            $table->integer('CLIE_HABIL_WEB')->nullable();
            $table->string('CLIE_PASSWORD_WEB', 255)->nullable();
            $table->string('CLIE_FORMATO_FIMC', 255)->nullable();
            $table->string('CLIE_HABIL_FABN', 255)->nullable();
            $table->integer('CLIE_VENDEDOR_2', 255)->nullable();
            $table->string('CLIE_STRING_1', 255)->nullable();
            $table->string('CLIE_STRING_2', 255)->nullable();
            $table->string('CLIE_STRING_3', 255)->nullable();
            $table->string('CLIE_STRING_4', 255)->nullable();
            $table->string('CLIE_FECHA_1', 255)->nullable();
            $table->string('CLIE_FECHA_2', 255)->nullable();
            $table->string('CLIE_FECHA_3', 255)->nullable();
            $table->string('CLIE_FECHA_4', 255)->nullable();
            $table->integer('CLIE_CLASIF_NPCV_1')->nullable();
            $table->integer('CLIE_CLASIF_NPCV_2')->nullable();
            $table->integer('CLIE_CLASIF_NPCV_3')->nullable();
            $table->integer('CLIE_CLASIF_NPCV_4')->nullable();
            $table->integer('CLIE_CLASIF_NPCV_5')->nullable();
            $table->integer('CLIE_CLASIF_NPCV_6')->nullable();
            $table->integer('CLIE_HABIL_CC_CLIE')->nullable();
            $table->integer('CLIE_CLIENTE_EXT')->nullable();
            $table->integer('CLIE_FECHA_PROX_GC')->nullable();
            $table->integer('CLIE_PROX_GES_COBR')->nullable();
            $table->integer('CLIE_ACCT_GENCBPTE')->nullable();
            $table->integer('CLIE_NODO_ORIGEN')->nullable();
            $table->integer('CLIE_MUNICIPIO')->nullable();
            $table->integer('CLIE_INF_TABASTO')->nullable();
            $table->integer('CLIE_COBRO_CORREL')->nullable();
            $table->integer('CLIE_VEHICULO')->nullable();
            $table->integer('CLIE_DISTRIBUIDOR')->nullable();
            $table->integer('CLIE_ZONA_DISTRIB')->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
