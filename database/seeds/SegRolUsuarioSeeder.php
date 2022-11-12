<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SegRolUsuarioSeeder extends Seeder
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
        //Roles del Usuario adminsystem
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '0',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '0',
            'seg_rol_id'         => '0',
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

        //Roles del Usuario superusuario
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '1',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '1',
            'seg_rol_id'         => '0',
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
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '2',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '1',
            'seg_rol_id'         => '1',
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
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '3',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '1',
            'seg_rol_id'         => '2',
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


        //Roles del Usuario innovapruebaadmin
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '4',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '2',
            'seg_rol_id'         => '1',
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
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '5',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '2',
            'seg_rol_id'         => '2',
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

        //Roles del Usuario innovapruebausuario
        DB::table('seg_rol_usuario')->insert([
            'id'                 => '6',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_usuario_id'     => '3',
            'seg_rol_id'         => '2',
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
