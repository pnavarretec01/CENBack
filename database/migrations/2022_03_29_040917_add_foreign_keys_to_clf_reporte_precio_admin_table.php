<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClfReportePrecioAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clf_reporte_precio_admin', function (Blueprint $table) {
            $table->foreign(['tico_id'], 'fk_tipo_combustible_admin')->references(['tico_id'])->on('prm_tipo_combustible')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clf_reporte_precio_admin', function (Blueprint $table) {
            $table->dropForeign('fk_tipo_combustible_admin');
        });
    }
}
