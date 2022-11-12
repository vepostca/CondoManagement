<?php

use Illuminate\Database\Seeder;
use InnovaCondomi\Entities\Com\Org;
use Carbon\Carbon;

class ComOrgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Org::create([
        $carbon = new Carbon();
        $fecha = $carbon->now();
        DB::table('com_org')->insert([
            'id'                 => '0',
            'com_cliente_id'     => '0',
            'codigo'             => '0',
            'nombre'             => '*',
            'id_legal'           => 'J-999999999',
            'descripcion'        => 'Todos los Condominios',
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
        DB::table('com_org')->insert([
            'id'                 => '1',
            'com_cliente_id'     => '1',
            'codigo'             => '1',
            'nombre'             => 'Condominio Innova Prueba',
            'id_legal'           => 'J-999999999',
            'descripcion'        => 'Condominio Innova Prueba',
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
