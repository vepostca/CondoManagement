<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SegOrgRolSeeder extends Seeder
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
        DB::table('seg_org_rol')->insert([
            'id'                 => '0',
            'com_cliente_id'     => '0',
            'com_org_id'         => '0',
            'seg_rol_id'         => '0',
            'es_solo_lectura'    => false,
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
        DB::table('seg_org_rol')->insert([
            'id'                 => '1',
            'com_cliente_id'     => '1',
            'com_org_id'         => '0',
            'seg_rol_id'         => '1',
            'es_solo_lectura'    => false,
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
        DB::table('seg_org_rol')->insert([
            'id'                 => '2',
            'com_cliente_id'     => '1',
            'com_org_id'         => '1',
            'seg_rol_id'         => '1',
            'es_solo_lectura'    => false,
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
        DB::table('seg_org_rol')->insert([
            'id'                 => '3',
            'com_cliente_id'     => '1',
            'com_org_id'         => '1',
            'seg_rol_id'         => '2',
            'es_solo_lectura'    => false,
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
