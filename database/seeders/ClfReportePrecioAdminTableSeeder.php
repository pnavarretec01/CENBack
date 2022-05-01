<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClfReportePrecioAdminTableSeeder extends Seeder
{

    public function run()
    {
        

        \DB::table('clf_reporte_precio_admin')->delete();
        
        \DB::table('clf_reporte_precio_admin')->insert(array (
            0 => 
            array (
                'repr_id' => 1,
                'repr_detalle' => 'Parafina',
                'repr_ind_act' => 1,
                'tico_id' => 4,
            ),
            1 => 
            array (
                'repr_id' => 2,
                'repr_detalle' => 'Gas',
                'repr_ind_act' => 1,
                'tico_id' => 3,
            ),
            2 => 
            array (
                'repr_id' => 3,
                'repr_detalle' => 'Leña',
                'repr_ind_act' => 1,
                'tico_id' => 1,
            ),
            3 => 
            array (
                'repr_id' => 4,
                'repr_detalle' => 'Pellet',
                'repr_ind_act' => 1,
                'tico_id' => 2,
            ),
        ));
        
        
    }
}