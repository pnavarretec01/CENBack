<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrmTipoCombustibleTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('prm_tipo_combustible')->delete();
        
        \DB::table('prm_tipo_combustible')->insert(array (
            0 => 
            array (
                'tico_id' => 1,
                'tico_descripcion' => 'Leña',
                'tico_ind_act' => 1,
            ),
            1 => 
            array (
                'tico_id' => 2,
                'tico_descripcion' => 'Pellet',
                'tico_ind_act' => 1,
            ),
            2 => 
            array (
                'tico_id' => 3,
                'tico_descripcion' => 'Gas licuado',
                'tico_ind_act' => 1,
            ),
            3 => 
            array (
                'tico_id' => 4,
                'tico_descripcion' => 'Parafina',
                'tico_ind_act' => 1,
            ),
        ));
        
        
    }
}