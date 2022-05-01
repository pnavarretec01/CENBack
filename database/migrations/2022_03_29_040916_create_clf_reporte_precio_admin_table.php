<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfReportePrecioAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_reporte_precio_admin', function (Blueprint $table) {
            $table->integer('repr_id', true);
            $table->string('repr_detalle');
            $table->integer('repr_ind_act');
            $table->integer('tico_id')->index('fk_tipo_combustible_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clf_reporte_precio_admin');
    }
}
