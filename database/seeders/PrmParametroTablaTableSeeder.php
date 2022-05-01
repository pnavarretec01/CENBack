<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmParametroTablaTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('prm_parametro_tabla')->delete();
        
        \DB::table('prm_parametro_tabla')->insert(array (
            0 => 
            array (
                'param_id' => 1,
                'param_tabla' => 'prm_especie_normalizada',
                'param_descripcion' => 'Especie normalizada',
            ),
            1 => 
            array (
                'param_id' => 2,
                'param_tabla' => 'prm_unidad_normalizada',
                'param_descripcion' => 'Unidad normalizada',
            ),
        ));
        
        
    }
}