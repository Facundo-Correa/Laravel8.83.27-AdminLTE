<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasimpagasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cuotasimpagas';

    /**
     * Run the migrations.
     * @table cuotassimpagas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('cvcl_division_cvcl')->nullable();
            $table->integer('cvcl_sucursal_imp')->nullable();
            $table->integer('ctec_cliente_venta')->nullable();
            $table->string('cvcl_tipo_var', 5)->nullable();
            $table->integer('cvcl_numero_cvcl')->nullable();
            $table->date('vctc_fecha_vto_fin')->nullable();
            $table->string('cvcl_referencia_1', 45)->nullable();
            $table->float('valor_cuota')->nullable();
            $table->string('datcodusuario', 45)->nullable();

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
