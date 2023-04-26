<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriaderosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'criaderos';

    /**
     * Run the migrations.
     * @table criaderos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('criadero_cod');
            $table->integer('criadero_cliente_cod')->nullable();
            $table->string('criadero_descripcion', 45)->nullable();
            $table->string('criadero_domicilio', 45)->nullable();
            $table->string('criadero_localidad', 45)->nullable();
            $table->string('criadero_telefono', 45)->nullable();
            $table->string('criadero_codigoprov', 45)->nullable();
            $table->integer('criadero_zona')->nullable();
            $table->string('criadero_ultimaletra', 1)->nullable();
            $table->string('criadero_tatu_rech_cod', 45)->nullable();
            $table->string('criadero_tatu_acep_cod', 45)->nullable();
            $table->date('criadero_fechaalta')->nullable();
            $table->date('criadero_fechabaja')->nullable();
            $table->string('criadero_pais_cod', 4)->nullable();
            $table->string('criadero_nombre_duenio', 45)->nullable();
            $table->string('criadero_observaciones')->nullable();

            $table->unique(["id"], 'id_UNIQUE');

            $table->index(["criadero_cod"], 'criadero_cod_UNIQUE');
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
