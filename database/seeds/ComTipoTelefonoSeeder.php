<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComTipoTelefonoSeeder extends Seeder
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
        DB::table('com_tipo_telefono')->insert([
            'id' => '1', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-MOV',
            'nombre' => 'Celular', 'siglas' => 'Cel.', 'descripcion' => 'Teléfono Celular',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '2', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-TMOV',
            'nombre' => 'Celular Trabajo', 'siglas' => 'Cel. Trab.', 'descripcion' => 'Teléfono Celular Trabajo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '3', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-TRA',
            'nombre' => 'Trabajo', 'siglas' => 'Trab.', 'descripcion' => 'Teléfono de Trabajo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '4', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-TFAX',
            'nombre' => 'Trabajo Fax', 'siglas' => 'Trab. Fax', 'descripcion' => 'Teléfono Fax de Trabajo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '5', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-RES',
            'nombre' => 'Residencia', 'siglas' => 'Resid.', 'descripcion' => 'Teléfono de Residencia',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '6', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-RFAX',
            'nombre' => 'Residencia Fax', 'siglas' => 'Resid. Fax', 'descripcion' => 'Teléfono Fax de Residencia',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '7', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-LOC',
            'nombre' => 'Localizador', 'siglas' => 'Loc.', 'descripcion' => 'Teléfono Localizador',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_telefono')->insert([
            'id' => '8', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TEL-PRIV',
            'nombre' => 'Privado', 'siglas' => 'Priv.', 'descripcion' => 'Teléfono Privado',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
