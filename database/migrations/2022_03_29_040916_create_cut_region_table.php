<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cut_region', function (Blueprint $table) {
            $table->integer('reg_id')->primary();
            $table->string('reg_id_hml');
            $table->string('reg_nombre');
            $table->integer('reg_orden')->nullable();
            $table->integer('reg_ind_act');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cut_region');
    }
}
