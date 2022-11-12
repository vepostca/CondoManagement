<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComRegionSeeder extends Seeder
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
        DB::table('com_region')->insert([
            'id' => '240-01', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'AM-VE', 'nombre' => 'Amazonas', 'siglas' => 'AM', 'descripcion' => 'Amazonas',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-02', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'AN-VE', 'nombre' => 'Anzoátegui', 'siglas' => 'AN', 'descripcion' => 'Anzoátegui',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-03', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'AP-VE', 'nombre' => 'Apure', 'siglas' => 'AP', 'descripcion' => 'Apure',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-04', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'AR-VE', 'nombre' => 'Aragua', 'siglas' => 'AR', 'descripcion' => 'Aragua',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-05', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'BA-VE', 'nombre' => 'Barinas', 'siglas' => 'BA', 'descripcion' => 'Barinas',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-06', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'BO-VE', 'nombre' => 'Bolívar', 'siglas' => 'BO', 'descripcion' => 'Bolívar',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-07', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'CA-VE', 'nombre' => 'Carabobo', 'siglas' => 'CA', 'descripcion' => 'Carabobo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-08', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'CO-VE', 'nombre' => 'Cojedes', 'siglas' => 'CO', 'descripcion' => 'Cojedes',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-09', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'DA-VE', 'nombre' => 'Delta Amacuro', 'siglas' => 'DA', 'descripcion' => 'Delta Amacuro',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-10', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'DC-VE', 'nombre' => 'Distrito Capital', 'siglas' => 'DC', 'descripcion' => 'Distrito Capital',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-11', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'FA-VE', 'nombre' => 'Falcón', 'siglas' => 'FA', 'descripcion' => 'Falcón',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-12', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'GU-VE', 'nombre' => 'Guárico', 'siglas' => 'GU', 'descripcion' => 'Guárico',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-13', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'LA-VE', 'nombre' => 'Lara', 'siglas' => 'LA', 'descripcion' => 'Lara',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-14', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'ME-VE', 'nombre' => 'Mérida', 'siglas' => 'ME', 'descripcion' => 'Mérida',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-15', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'MI-VE', 'nombre' => 'Miranda', 'siglas' => 'MI', 'descripcion' => 'Miranda',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-16', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'MO-VE', 'nombre' => 'Monagas', 'siglas' => 'MO', 'descripcion' => 'Monagas',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-17', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'NE-VE', 'nombre' => 'Nueva Esparta', 'siglas' => 'NE', 'descripcion' => 'Nueva Esparta',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-18', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'PO-VE', 'nombre' => 'Portuguesa', 'siglas' => 'PO', 'descripcion' => 'Portuguesa',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-19', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'SU-VE', 'nombre' => 'Sucre', 'siglas' => 'SU', 'descripcion' => 'Sucre',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-20', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'TA-VE', 'nombre' => 'Táchira', 'siglas' => 'TA', 'descripcion' => 'Táchira',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-21', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'TR-VE', 'nombre' => 'Trujillo', 'siglas' => 'TR', 'descripcion' => 'Trujillo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-22', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'VA-VE', 'nombre' => 'Vargas', 'siglas' => 'VA', 'descripcion' => 'Vargas',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-23', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'YA-VE', 'nombre' => 'Yaracuy', 'siglas' => 'YA', 'descripcion' => 'Yaracuy',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_region')->insert([
            'id' => '240-24', 'com_cliente_id' => '0', 'com_org_id' => '0', 'com_pais_id' => '240',
            'codigo' => 'ZU-VE', 'nombre' => 'Zulia', 'siglas' => 'ZU', 'descripcion' => 'Zulia',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
