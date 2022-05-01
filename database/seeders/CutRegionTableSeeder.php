<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CutRegionTableSeeder extends Seeder
{
    
    public function run()
    {
        

        \DB::table('cut_region')->delete();
        
        \DB::table('cut_region')->insert(array (
            0 => 
            array (
                'reg_id' => 1,
                'reg_id_hml' => '01',
                'reg_nombre' => 'Tarapacá',
                'reg_orden' => 2,
                'reg_ind_act' => 1,
            ),
            1 => 
            array (
                'reg_id' => 2,
                'reg_id_hml' => '02',
                'reg_nombre' => 'Antofagasta',
                'reg_orden' => 3,
                'reg_ind_act' => 1,
            ),
            2 => 
            array (
                'reg_id' => 3,
                'reg_id_hml' => '03',
                'reg_nombre' => 'Atacama',
                'reg_orden' => 4,
                'reg_ind_act' => 1,
            ),
            3 => 
            array (
                'reg_id' => 4,
                'reg_id_hml' => '04',
                'reg_nombre' => 'Coquimbo',
                'reg_orden' => 5,
                'reg_ind_act' => 1,
            ),
            4 => 
            array (
                'reg_id' => 5,
                'reg_id_hml' => '05',
                'reg_nombre' => 'Valparaíso',
                'reg_orden' => 6,
                'reg_ind_act' => 1,
            ),
            5 => 
            array (
                'reg_id' => 6,
                'reg_id_hml' => '06',
                'reg_nombre' => 'Libertador General Bernardo O\'Higgins',
                'reg_orden' => 8,
                'reg_ind_act' => 1,
            ),
            6 => 
            array (
                'reg_id' => 7,
                'reg_id_hml' => '07',
                'reg_nombre' => 'Maule',
                'reg_orden' => 9,
                'reg_ind_act' => 1,
            ),
            7 => 
            array (
                'reg_id' => 8,
                'reg_id_hml' => '08',
                'reg_nombre' => 'Biobío',
                'reg_orden' => 10,
                'reg_ind_act' => 1,
            ),
            8 => 
            array (
                'reg_id' => 9,
                'reg_id_hml' => '09',
                'reg_nombre' => 'La Araucanía',
                'reg_orden' => 12,
                'reg_ind_act' => 1,
            ),
            9 => 
            array (
                'reg_id' => 10,
                'reg_id_hml' => '10',
                'reg_nombre' => 'Los Lagos',
                'reg_orden' => 14,
                'reg_ind_act' => 1,
            ),
            10 => 
            array (
                'reg_id' => 11,
                'reg_id_hml' => '11',
                'reg_nombre' => 'Aysén del General Carlos Ibáñez del Campo',
                'reg_orden' => 15,
                'reg_ind_act' => 1,
            ),
            11 => 
            array (
                'reg_id' => 12,
                'reg_id_hml' => '12',
                'reg_nombre' => 'Magallanes y de la Antártica Chilena',
                'reg_orden' => 16,
                'reg_ind_act' => 1,
            ),
            12 => 
            array (
                'reg_id' => 13,
                'reg_id_hml' => '13',
                'reg_nombre' => 'Metropolitana de Santiago',
                'reg_orden' => 7,
                'reg_ind_act' => 1,
            ),
            13 => 
            array (
                'reg_id' => 14,
                'reg_id_hml' => '14',
                'reg_nombre' => 'Los Ríos',
                'reg_orden' => 13,
                'reg_ind_act' => 1,
            ),
            14 => 
            array (
                'reg_id' => 15,
                'reg_id_hml' => '15',
                'reg_nombre' => 'Arica y Parinacota',
                'reg_orden' => 1,
                'reg_ind_act' => 1,
            ),
            15 => 
            array (
                'reg_id' => 16,
                'reg_id_hml' => '16',
                'reg_nombre' => 'Ñuble',
                'reg_orden' => 11,
                'reg_ind_act' => 1,
            ),
        ));
        
        
    }
}