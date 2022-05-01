<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoCalificacionTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('prm_tipo_calificacion')->delete();
        
        \DB::table('prm_tipo_calificacion')->insert(array (
            0 => 
            array (
                'tpcl_id' => 1,
                'tpcl_cant_estrellas' => 5,
                'tpcl_descripcion' => 'Excelente servicio',
                'tpcl_ind_act' => 1,
            ),
            1 => 
            array (
                'tpcl_id' => 2,
                'tpcl_cant_estrellas' => 4,
                'tpcl_descripcion' => 'Buen trato',
                'tpcl_ind_act' => 1,
            ),
            2 => 
            array (
                'tpcl_id' => 3,
                'tpcl_cant_estrellas' => 3,
                'tpcl_descripcion' => 'Me es indiferente',
                'tpcl_ind_act' => 1,
            ),
            3 => 
            array (
                'tpcl_id' => 4,
                'tpcl_cant_estrellas' => 2,
                'tpcl_descripcion' => 'Baja calidad',
                'tpcl_ind_act' => 1,
            ),
            4 => 
            array (
                'tpcl_id' => 11,
                'tpcl_cant_estrellas' => 5,
                'tpcl_descripcion' => 'Excelente  desarrollo',
                'tpcl_ind_act' => 1,
            ),
            5 => 
            array (
                'tpcl_id' => 17,
                'tpcl_cant_estrellas' => 5,
                'tpcl_descripcion' => 'Excelente',
                'tpcl_ind_act' => 1,
            ),
        ));
        
        
    }
}