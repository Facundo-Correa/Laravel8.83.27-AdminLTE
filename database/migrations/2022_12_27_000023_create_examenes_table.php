<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'examenes';

    /**
     * Run the migrations.
     * @table examenes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('examen_nro_de_control')->nullable();
            $table->integer('examen_cod')->nullable();
            $table->integer('examen_categoria')->nullable();
            $table->date('examen_fecha')->nullable();
            $table->integer('examen_lugar_cod')->nullable();
            $table->string('examen_provincia', 45)->nullable();
            $table->integer('examen_tomado')->nullable();
            $table->integer('examen_publicado_revista')->nullable();
            $table->integer('examen_publicado_internet')->nullable();
            $table->integer('examen_nivel')->nullable();

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
