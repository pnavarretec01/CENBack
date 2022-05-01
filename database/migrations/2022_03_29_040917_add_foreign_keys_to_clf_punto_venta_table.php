<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfPuntoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_punto_venta', function (Blueprint $table) {
            $table->foreign(['com_id'], 'fk_comuna_punto')->references(['com_id'])->on('cut_comuna')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tico_id'], 'fk_tipo_combustible')->references(['tico_id'])->on('prm_tipo_combustible')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['reg_id'], 'fk_region_punto')->references(['reg_id'])->on('cut_region')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_punto_venta', function (Blueprint $table) {
            $table->dropForeign('fk_comuna_punto');
            $table->dropForeign('fk_tipo_combustible');
            $table->dropForeign('fk_region_punto');
        });
    }
}
