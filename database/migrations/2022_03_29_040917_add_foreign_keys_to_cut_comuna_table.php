<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCutComunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cut_comuna', function (Blueprint $table) {
            $table->foreign(['reg_id'], 'fk_region_comuna_')->references(['reg_id'])->on('cut_region')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cut_comuna', function (Blueprint $table) {
            $table->dropForeign('fk_region_comuna_');
        });
    }
}
