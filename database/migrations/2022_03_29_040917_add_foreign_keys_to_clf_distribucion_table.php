<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_distribucion', function (Blueprint $table) {
            $table->foreign(['ptv_id'], 'fk_punto_venta_distribucion')->references(['ptv_id'])->on('clf_punto_venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tidi_id'], 'fk_tipo_distribucion_punto_venta')->references(['tidi_id'])->on('prm_tipo_distribucion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_distribucion', function (Blueprint $table) {
            $table->dropForeign('fk_punto_venta_distribucion');
            $table->dropForeign('fk_tipo_distribucion_punto_venta');
        });
    }
}
