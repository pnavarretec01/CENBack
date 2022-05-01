<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_producto', function (Blueprint $table) {
            $table->integer('prod_id', true);
            $table->integer('ptv_id')->index('fk_punto_venta_producto');
            $table->integer('tipr_id')->index('fk_tipo_producto');
            $table->string('prod_especie')->index('fk_prm_especie_normalizada id');
            $table->integer('tiun_id')->index('fk_prm_unidad_normalizada_id');
            $table->integer('tien_id')->index('fk_prm_especie_normalizada_id');
            $table->string('prod_unidad')->index('fk_unidad_normalizada');
            $table->boolean('prod_tiene_stock');
            $table->string('prod_marca')->nullable();
            $table->string('prod_precio', 12)->nullable();
            $table->boolean('prod_ind_act')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_producto');
    }
}
