<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComTipoContactoWebSeeder extends Seeder
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
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '1', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-MAILP',
            'nombre' => 'Email Personal', 'siglas' => 'Email Per.', 'descripcion' => 'Email Personal',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '2', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-MAILT',
            'nombre' => 'Email Trabajo', 'siglas' => 'Email Trab.', 'descripcion' => 'Email Trabajo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '3', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-URL',
            'nombre' => 'Sitio Web', 'siglas' => 'URL', 'descripcion' => 'Sitio Web',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '4', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-TW',
            'nombre' => 'Twitter', 'siglas' => 'TW', 'descripcion' => 'Twitter',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '5', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-FB',
            'nombre' => 'Facebook', 'siglas' => 'FB', 'descripcion' => 'Facebook',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '6', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-LI',
            'nombre' => 'LinkedIn', 'siglas' => 'LI', 'descripcion' => 'LinkedIn',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_contacto_web')->insert([
            'id' => '7', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'WEB-IN',
            'nombre' => 'Instagram', 'siglas' => 'IN', 'descripcion' => 'Instagram',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
