<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ComCategoriaConceptoSeeder extends Seeder
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
        DB::table('com_categoria_concepto')->insert([
            'id' => '1', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'ING-ORD',
            'nombre' => 'Ingresos Ordinarios', 'siglas' => 'Ing. Ord.', 'descripcion' => 'Ingresos Ordinarios',
            'tipo' => '1', 'orden'=> '1', 'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_categoria_concepto')->insert([
            'id' => '2', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'ING-EXTR',
            'nombre' => 'Ingresos Extraordinarios', 'siglas' => 'Ing. Extr.', 'descripcion' => 'Ingresos Extraordinarios',
            'tipo' => '1', 'orden'=> '2', 'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_categoria_concepto')->insert([
            'id' => '3', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'EGR-ORD',
            'nombre' => 'Egresos Ordinarios', 'siglas' => 'Egr. Ord.', 'descripcion' => 'Egresos Ordinarios',
            'tipo' => '-1', 'orden'=> '3', 'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_categoria_concepto')->insert([
            'id' => '4', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'EGR-EXTR',
            'nombre' => 'Egresos Extraordinarios', 'siglas' => 'Egr. Ord.', 'descripcion' => 'Egresos Egresos Extraordinarios',
            'tipo' => '-1', 'orden'=> '4', 'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
