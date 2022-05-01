<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfPuntoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_punto_venta', function (Blueprint $table) {
            $table->integer('ptv_id', true);
            $table->string('ptv_nombre');
            $table->integer('reg_id')->index('fk_region_punto');
            $table->integer('com_id')->index('fk_comuna_punto');
            $table->string('ptv_direccion');
            $table->float('ptv_utm_este', 255, 0);
            $table->float('ptv_utm_norte', 255, 0);
            $table->boolean('ptv_geolocalizado')->nullable();
            $table->string('ptv_nombre_contacto')->nullable();
            $table->bigInteger('ptv_telefono_contacto')->nullable();
            $table->string('ptv_correo_contacto')->nullable();
            $table->bigInteger('ptv_whatsapp')->nullable();
            $table->boolean('ptv_informacion_valida')->nullable();
            $table->string('ptv_observacion')->nullable();
            $table->integer('tico_id')->nullable()->index('fk_tipo_combustible');
            $table->tinyInteger('ptv_ind_act')->nullable();
            $table->geometry('ptv_thegeom')->nullable();
            $table->string('ptv_fuente')->nullable();
            $table->string('ptv_certificaciones')->nullable();
            $table->string('ptv_url_imagen')->nullable();
            $table->string('ptv_nombre_imagen')->nullable();
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
        Schema::dropIfExists('clf_punto_venta');
    }
}
