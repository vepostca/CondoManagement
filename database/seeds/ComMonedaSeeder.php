<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComMonedaSeeder extends Seeder
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
        DB::table('com_moneda')->insert([
            'id' => '937', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'VEF',
            'nombre' => 'Bolívar Fuerte', 'simbolo' => 'Bs F', 'descripcion' => 'Bolívar fuerte venezolano',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '840', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'USD',
            'nombre' => 'Dólar Estadounidense', 'simbolo' => '$', 'descripcion' => 'Dólar Estadounidense',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '170', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'COP',
            'nombre' => 'Peso Colombiano', 'simbolo' => '$', 'descripcion' => 'Peso Colombiano',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '32', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'ARS',
            'nombre' => 'Peso Argentino', 'simbolo' => '$', 'descripcion' => 'Peso Argentino',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '986', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'BRL',
            'nombre' => 'Real Brasileño', 'simbolo' => 'R$', 'descripcion' => 'Real Brasileño',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '604', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'PEN',
            'nombre' => 'Nuevo Sol Peruano', 'simbolo' => 'S/.', 'descripcion' => 'Nuevo Sol Peruano',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '600', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'PYG',
            'nombre' => 'Guaraní Paraguayo', 'simbolo' => '₲', 'descripcion' => 'Guaraní Paraguayo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_moneda')->insert([
            'id' => '858', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo_iso' => 'UYU',
            'nombre' => 'Peso Uruguayo', 'simbolo' => '$', 'descripcion' => 'Peso Uruguayo',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
