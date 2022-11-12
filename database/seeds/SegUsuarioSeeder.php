<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SegUsuarioSeeder extends Seeder
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
        DB::table('seg_usuario')->insert([
            'id'                 => '0',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'nombres'            => 'Admin',
            'apellidos'          => 'System',
            'username'           => 'adminsystem',
            'email'              => 'adminsystem@dominio.com',
            'password'           => bcrypt('AdminSystem'),
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

        DB::table('seg_usuario')->insert([
            'id'                 => '1',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'nombres'            => 'Super',
            'apellidos'          => 'Usuario',
            'username'           => 'superusuario',
            'email'              => 'superusuario@dominio.com',
            'password'           => bcrypt('SuperUsuario'),
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

        DB::table('seg_usuario')->insert([
            'id'                 => '2',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'nombres'            => 'Admin',
            'apellidos'          => 'Innova Prueba',
            'username'           => 'innovapruebaadmin',
            'email'              => 'innovapruebaadmin@dominio.com',
            'password'           => bcrypt('SuperUsuario'),
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

        DB::table('seg_usuario')->insert([
            'id'                 => '3',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'nombres'            => 'Usuario',
            'apellidos'          => 'Innova Prueba',
            'username'           => 'innovapruebausuario',
            'email'              => 'innovapruebausuario@dominio.com',
            'password'           => bcrypt('SuperUsuario'),
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
