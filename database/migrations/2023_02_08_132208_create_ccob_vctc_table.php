<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcobVctcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccob_vctc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('VCTC_CTACTE_CTEC')->nullable();
            $table->string('VCTC_RENGLON_VCTC')->nullable();
            $table->string('VCTC_FECHA_VTO')->nullable();
            $table->string('VCTC_FECHA_VTO_FIN')->nullable();
            $table->string('VCTC_NUM_CUOTA')->nullable();
            $table->string('VCTC_IMP_ORI')->nullable();
            $table->string('VCTC_IMP_LOC')->nullable();
            $table->string('VCTC_SAL_ORI')->nullable();
            $table->string('VCTC_SAL_LOC')->nullable();
            $table->string('VCTC_FECHA_VTO_INT')->nullable();

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
        Schema::dropIfExists('ccob_vctc');
    }
}
