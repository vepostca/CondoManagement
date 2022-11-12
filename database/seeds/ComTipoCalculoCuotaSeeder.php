<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ComTipoCalculoCuotaSeeder extends Seeder
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
        DB::table('com_tipo_calculo_cuota')->insert([
            'id' => '1', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TCC01',
            'nombre' => 'Coeficiente', 'siglas' => 'Coef.',
            'descripcion' => 'Se calculará la cuota a partir de los gastos,  según el coeficiente (Porcentaje) asignado al inmueble. La fecha de emisión de la cuota es el último de cada mes.',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
        DB::table('com_tipo_calculo_cuota')->insert([
            'id' => '2', 'com_cliente_id' => '0', 'com_org_id' => '0', 'codigo' => 'TCC02',
            'nombre' => 'Cuota Fija', 'siglas' => 'Cta. Fij.',
            'descripcion' => 'Monto Fijo para la Cuota de un inmueble.',
            'activo' => true, 'borrado' => false,
            'deleted_at' => null, 'created_by' => '0', 'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1'
        ]);
    }
}
