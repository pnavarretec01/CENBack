<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfMedioPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_medio_pago', function (Blueprint $table) {
            $table->integer('ptv_id');
            $table->integer('timp_id')->index('fk_tipo_medio_pago');

            $table->primary(['ptv_id', 'timp_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_medio_pago');
    }
}
