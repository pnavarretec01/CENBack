<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CutRegionTableSeeder::class);
        $this->call(CutComunaTableSeeder::class);
        $this->call(PrmParametroTablaTableSeeder::class);
        $this->call(PrmTipoCombustibleTableSeeder::class);
        $this->call(PrmTipoDistribucionTableSeeder::class);
        $this->call(PrmTipoMedioPagoTableSeeder::class);
        $this->call(PrmTipoPerfilTableSeeder::class);
        $this->call(PrmTipoProductoTableSeeder::class);
        $this->call(PrmTipoCalificacionTableSeeder::class);
        $this->call(ClfReportePrecioAdminTableSeeder::class);
        $this->call(ClfUsuarioTableSeeder::class);
        $this->call(ClfUsuarioDpaTableSeeder::class);
    }
}
