<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfTarifaElectricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_tarifa_electrica', function (Blueprint $table) {
            $table->foreign(['com_id'], 'fk_id_comuna_tarifa')->references(['com_id'])->on('cut_comuna')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['reg_id'], 'fk_id_region_tarifa')->references(['reg_id'])->on('cut_region')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_tarifa_electrica', function (Blueprint $table) {
            $table->dropForeign('fk_id_comuna_tarifa');
            $table->dropForeign('fk_id_region_tarifa');
        });
    }
}
