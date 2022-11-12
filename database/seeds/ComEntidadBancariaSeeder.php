<?php

use Illuminate\Database\Seeder;

class ComEntidadBancariaSeeder extends Seeder
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
        DB::table('com_entidad_bancaria')->insert(['id'=>'1', 'com_cliente_id'=>'0', 'com_org_id'=>'ORG', 'codigo'=>'001', 'nombre'=>'100% Banco', 'siglas'=>'100% Bco.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'2', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'002', 'nombre'=>'Bancamiga', 'siglas'=>'Bcamig.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'3', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'003', 'nombre'=>'Bancaribe', 'siglas'=>'Bcarib.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'4', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'004', 'nombre'=>'Banco Activo', 'siglas'=>'Bco. Act.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'5', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'005', 'nombre'=>'Banco Agrícola de Venezuela', 'siglas'=>'Bco. Agric. Vzla.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'6', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'006', 'nombre'=>'Banco Caroní', 'siglas'=>'Bco. Crn.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'7', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'007', 'nombre'=>'Banco de Exportación y Comercio', 'siglas'=>'Bco. Exp. Com.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'8', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'008', 'nombre'=>'Banco de Venezuela', 'siglas'=>'Bco. Vzla.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'9', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'009', 'nombre'=>'Banco del Tesoro', 'siglas'=>'Bco. Tes.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'10', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'010', 'nombre'=>'Banco Exterior', 'siglas'=>'Bco. Ext.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'11', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'011', 'nombre'=>'Banco Fondo Común', 'siglas'=>'BFC','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'12', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'012', 'nombre'=>'Banco Internacional de Desarrollo', 'siglas'=>'BID','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'13', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'013', 'nombre'=>'Banco Mercantil', 'siglas'=>'Bco. Merc.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'14', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'014', 'nombre'=>'Banco Nacional de Crédito', 'siglas'=>'BNC','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'15', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'015', 'nombre'=>'Banco Occidental de Descuento BOD', 'siglas'=>'BOD','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'16', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'016', 'nombre'=>'Banco Plaza', 'siglas'=>'Bco. Pza','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'17', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'017', 'nombre'=>'Banco Sofitasa', 'siglas'=>'Sofitasa','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'18', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'018', 'nombre'=>'Bancoex', 'siglas'=>'Bancoex','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'19', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'019', 'nombre'=>'Bancrecer', 'siglas'=>'Bcrec.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'20', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'020', 'nombre'=>'Banesco', 'siglas'=>'Bsco.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'21', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'021', 'nombre'=>'Banfanb', 'siglas'=>'Banfanb','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'22', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'022', 'nombre'=>'Bangente', 'siglas'=>'Bgte.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'23', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'023', 'nombre'=>'Banplus', 'siglas'=>'Bplus.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'24', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'024', 'nombre'=>'BBVA Provincial', 'siglas'=>'Bco. Prov.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'25', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'025', 'nombre'=>'Bicentenario Banco Universal', 'siglas'=>'Bicent.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'26', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'026', 'nombre'=>'Citibank', 'siglas'=>'Citibank','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'27', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'027', 'nombre'=>'DELSUR Banco Universal', 'siglas'=>'DELSUR','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'28', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'028', 'nombre'=>'Instituto Municipal de Crédito Popular (IMCP)', 'siglas'=>'IMCP','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'29', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'029', 'nombre'=>'Mi Banco', 'siglas'=>'MiBco.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'30', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'030', 'nombre'=>'Novo Banco', 'siglas'=>'Novo Bco.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);
        DB::table('com_entidad_bancaria')->insert(['id'=>'31', 'com_cliente_id'=>'0', 'com_org_id'=>'0', 'codigo'=>'031', 'nombre'=>'Venezolano de Crédito', 'siglas'=>'Vzlno. Cred.','activo' => true, 'borrado' => false,'deleted_at' => null, 'created_by' => '0',
            'created_at' => $fecha, 'created_ip' => '127.0.0.1',
            'updated_by' => '0', 'updated_at' => $fecha, 'updated_ip' => '127.0.0.1']);

    }
}
