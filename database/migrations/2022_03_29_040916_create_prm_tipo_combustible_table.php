<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrmTipoCombustibleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prm_tipo_combustible', function (Blueprint $table) {
            $table->integer('tico_id', true);
            $table->string('tico_descripcion')->nullable();
            $table->integer('tico_ind_act')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prm_tipo_combustible');
    }
}
