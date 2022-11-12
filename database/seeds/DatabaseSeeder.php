<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(ComClienteSeeder::class);
        $this->call(ComOrgSeeder::class);
        $this->call(SegUsuarioSeeder::class);
        $this->call(SegRolSeeder::class);
        $this->call(SegRolUsuarioSeeder::class);
        $this->call(SegOrgRolSeeder::class);
        $this->call(ComPaisSeeder::class);
        $this->call(ComRegionSeeder::class);
        $this->call(ComTipoDireccionSeeder::class);
        $this->call(ComTipoTelefonoSeeder::class);
        $this->call(ComTipoContactoWebSeeder::class);
        $this->call(ComMonedaSeeder::class);
        $this->call(ComCategoriaConceptoSeeder::class);
        $this->call(ComTipoCalculoCuotaSeeder::class);
        $this->call(ComEntidadBancariaSeeder::class);
    }
}
