<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametrosNrosDelSistemaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'parametros_nros_del_sistema';

    /**
     * Run the migrations.
     * @table parametros_nros_del_sistema
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('param_codigo', 45)->nullable();
            $table->string('param_descripcion', 45)->nullable();
            $table->integer('param_valor_inicial')->nullable();
            $table->integer('param_ultimo_valor')->nullable();

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
