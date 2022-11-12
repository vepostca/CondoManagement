<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SegRolSeeder extends Seeder
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
        DB::table('seg_rol')->insert([
            'id'                 => '0',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'nombre'             => 'Administrador del Sistema',
            'slug'               => 'administrador-sistema',
            'descripcion'        => 'Rol de Administrador del Sistema (No puede ser modificado)',
            'nivel_jerarquia'    => 1,
            'nivel_acceso'       => 'S--',
            'activo'             => true,
            'borrado'            => false,
            'deleted_at'         => null,
            'created_by'         => '0',
            'created_at'         => $fecha,
            'created_ip'         => '127.0.0.1',
            'updated_by'         => '0',
            'updated_at'         => $fecha,
            'updated_ip'         => '127.0.0.1'
        ]);
        DB::table('seg_rol')->insert([
            'id'                 => '1',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'nombre'             => 'Administrador Innova Prueba',
            'slug'               => 'administrador-innova-prueba',
            'descripcion'        => 'Rol Administrador de la Compañía Innova Prueba',
            'nivel_jerarquia'    => 1,
            'nivel_acceso'       => '-CO',
            'activo'             => true,
            'borrado'            => false,
            'deleted_at'         => null,
            'created_by'         => '0',
            'created_at'         => $fecha,
            'created_ip'         => '127.0.0.1',
            'updated_by'         => '0',
            'updated_at'         => $fecha,
            'updated_ip'         => '127.0.0.1'
        ]);
        DB::table('seg_rol')->insert([
            'id'                 => '2',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'nombre'             => 'Usuario Innova Prueba',
            'slug'               => 'usuario-innova-prueba',
            'descripcion'        => 'Rol Usuario de la Compañía Innova Prueba',
            'nivel_jerarquia'    => 1,
            'nivel_acceso'       => '--O',
            'activo'             => true,
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
