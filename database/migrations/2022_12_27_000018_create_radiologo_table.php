<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadiologoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'radiologo';

    /**
     * Run the migrations.
     * @table radiologo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('radiologo_cod')->nullable();
            $table->string('radiologo_nombre', 45)->nullable();
            $table->string('radiologo_apellido', 45)->nullable();
            $table->string('radiologo_domicilio', 45)->nullable();
            $table->string('radiologo_localidad', 45)->nullable();
            $table->string('radiologo_telefono', 45)->nullable();
            $table->date('radiologo_inicio')->nullable();
            $table->date('radiologo_baja')->nullable();
            $table->string('radiologo_email', 45)->nullable();
            $table->integer('radiologo_zona')->nullable();
            $table->string('radiologo_prov', 4)->nullable();
            $table->integer('radiologo_dni')->nullable();
            $table->integer('radiologo_codigo_postal')->nullable();
            $table->string('radiologo_turno', 2)->nullable();

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
