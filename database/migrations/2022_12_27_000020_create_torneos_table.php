<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'torneos';

    /**
     * Run the migrations.
     * @table torneos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('torneo_cod', 45)->nullable();
            $table->string('torneo_desc', 45)->nullable();
            $table->string('torneo_ingreso_por_tramites', 2)->nullable();
            $table->string('torneos_es_interagrupacion', 2)->nullable();
            $table->string('torneos_es_nacional', 2)->nullable();
            $table->string('torneos_es_regional', 2)->nullable();
            $table->string('torneos_es_interagrup_interior', 2)->nullable();

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
