<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComTipoDireccionSeeder extends Seeder
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
        DB::table('com_tipo_direccion')->insert([
            'id' => '1', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'DIR-RES',
            'nombre' => 'Residencial', 'siglas' => 'Resid.', 'descripcion' => 'Dirección Residencial',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_direccion')->insert([
            'id' => '2', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'DIR-LAB',
            'nombre' => 'Laboral', 'siglas' => 'Lab.', 'descripcion' => 'Dirección Laboral',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
