<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteTramitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reporte_tramites';

    /**
     * Run the migrations.
     * @table reporte_tramites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tr_usuario')->nullable();
            $table->integer('tr_cliente_agrup_cod')->nullable();
            $table->integer('tr_cliente_venta')->nullable();
            $table->string('tr_concepto_codigo_pla', 45)->nullable();
            $table->float('tr_concepto_valor')->nullable();
            $table->float('tr_nro_fact')->nullable();
            $table->float('tr_ndebito_valor')->nullable();
            $table->float('tr_ncredito_valor')->nullable();
            $table->string('tr_documento_pla', 45)->nullable();
            $table->string('tr_fecha_tramite')->nullable();
            $table->string('tr_condicional', 2)->nullable();
            $table->string('tr_tramite', 45)->nullable();
            $table->date('tr_fecha')->nullable();
            $table->time('tr_hora')->nullable();
            $table->string('tr_transaccion', 45)->nullable();
            $table->string('tr_tipo_tratamiento', 45)->nullable();
            $table->string('tr_publi_internet', 45)->nullable();
            $table->date('tr_puibli_internet_fecha')->nullable();
            $table->string('tr_publi_revista', 45)->nullable();
            $table->date('tr_publi_revista_fecha')->nullable();
            $table->string('tr_baja_logico', 45)->nullable();
            $table->longtext('tr_leyenda')->nullable();
            $table->integer('tr_id')->nullable();

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
