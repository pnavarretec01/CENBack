<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfMedioPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_medio_pago', function (Blueprint $table) {
            $table->foreign(['ptv_id'], 'fk_punto_venta')->references(['ptv_id'])->on('clf_punto_venta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['timp_id'], 'fk_tipo_medio_pago')->references(['timp_id'])->on('prm_tipo_medio_pago')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_medio_pago', function (Blueprint $table) {
            $table->dropForeign('fk_punto_venta');
            $table->dropForeign('fk_tipo_medio_pago');
        });
    }
}
