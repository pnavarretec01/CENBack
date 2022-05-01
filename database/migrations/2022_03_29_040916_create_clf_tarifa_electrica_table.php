<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfTarifaElectricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_tarifa_electrica', function (Blueprint $table) {
            $table->integer('tari_id', true);
            $table->integer('reg_id')->index('fk_id_region_tarifa');
            $table->integer('com_id')->index('fk_id_comuna_tarifa');
            $table->string('tari_url');
            $table->string('tari_informacion');
            $table->string('tari_mensaje');
            $table->integer('tari_ind_act');
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
        Schema::dropIfExists('clf_tarifa_electrica');
    }
}
