<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenResulDcfcodoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examen_resul_dcfcodo';

    /**
     * Run the migrations.
     * @table examen_resul_dcfcodo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_nro_control')->nullable();
            $table->string('can_letra', 45)->nullable();
            $table->integer('can_numero')->nullable();
            $table->string('dcf_grado', 45)->nullable();
            $table->string('dcf_calificacion', 45)->nullable();
            $table->integer('dcf_radiologo_cod')->nullable();
            $table->longtext('dcf_observaciones')->nullable();
            $table->string('dcf_revista', 45)->nullable();
            $table->string('dcf_internet', 45)->nullable();

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
