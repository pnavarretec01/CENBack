<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutComunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cut_comuna', function (Blueprint $table) {
            $table->integer('com_id')->primary();
            $table->string('com_id_hml')->nullable();
            $table->string('com_nombre');
            $table->integer('reg_id')->index('fk_region_comuna__idx');
            $table->integer('com_ind_acti');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cut_comuna');
    }
}
