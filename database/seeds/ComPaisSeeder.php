<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        $fecha = $carbon->now();
        DB::table('com_pais')->insert([
            'id' => '240', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso2' => 'VE',
            'codigo_iso3' => 'VEN', 'nombre' => 'Venezuela', 'descripcion' => 'Venezuela',
            'codigo_telefonico' => '58', 'tiene_region' => true, 'nombre_region' => 'Estado',
            'latitud' => 0, 'longitud' => 0, 'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
