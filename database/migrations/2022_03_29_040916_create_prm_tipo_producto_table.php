<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrmTipoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prm_tipo_producto', function (Blueprint $table) {
            $table->integer('tipr_id', true);
            $table->string('tipr_nombre');
            $table->integer('tipr_ind_act');
            $table->integer('tico_id')->index('tico_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prm_tipo_producto');
    }
}
