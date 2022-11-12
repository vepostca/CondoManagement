<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $carbon = new Carbon();
        $fecha = $carbon->now();
        DB::table('com_cliente')->insert([
            'id'                 => '0',
            'com_org_id'         => '0',
            'codigo'             => 'SYSTEM',
            'nombre'             => 'System',
            'id_legal'           => 'J-999999999',
            'descripcion'        => 'Compañía System',
            'activo'             => true,
            'servidor_smtp'      => '',
            'cuenta_smtp'        => '',
            'pwd_smtp'           => '',
            'seguridad_smtp'     => 'SSL',
            'puerto_smtp'        => '',
            'borrado'            => false,
            'deleted_at'         => null,
            'created_by'         => '0',
            'created_at'         => $fecha,
            'created_ip'         => '127.0.0.1',
            'updated_by'         => '0',
            'updated_at'         => $fecha,
            'updated_ip'         => '127.0.0.1'
        ]);
        DB::table('com_cliente')->insert([
            'id'                 => '1',
            'com_org_id'         => '0',
            'codigo'             => 'INNOVATEST',
            'nombre'             => 'Grupo Innova Prueba',
            'id_legal'           => 'J-999999999',
            'descripcion'        => 'Compañía ',
            'activo'             => true,
            'servidor_smtp'      => '',
            'cuenta_smtp'        => '',
            'pwd_smtp'           => '',
            'seguridad_smtp'     => 'SSL',
            'puerto_smtp'        => '',
            'borrado'            => false,
            'deleted_at'         => null,
            'created_by'         => '0',
            'created_at'         => $fecha,
            'created_ip'         => '127.0.0.1',
            'updated_by'         => '0',
            'updated_at'         => $fecha,
            'updated_ip'         => '127.0.0.1'
        ]);

    }
}
