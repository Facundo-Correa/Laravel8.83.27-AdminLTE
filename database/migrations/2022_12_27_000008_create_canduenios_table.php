<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandueniosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'canduenios';

    /**
     * Run the migrations.
     * @table candue�os
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('can_duenios_can_codigo_letra', 10)->nullable();
            $table->integer('can_duenios_can_codigo_numero')->nullable();
            $table->integer('can_duenios_cliente_cod')->nullable();
            $table->date('can_duenios_desde')->nullable();
            $table->date('can_duenios_hasta')->nullable();
            $table->string('can_duenios_autorizacion', 255)->nullable();
            $table->string('can_exduenio', 4)->nullable();
            $table->integer('can_nro_transfer')->nullable();
            $table->integer('can_duenios_marca_para_informes')->nullable();
            $table->integer('can_duenios_primer_duenio')->nullable();
            $table->integer('can_datCodUsuario')->nullable();
            $table->string('can_duenios_tipo_transfer', 10)->nullable();

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
