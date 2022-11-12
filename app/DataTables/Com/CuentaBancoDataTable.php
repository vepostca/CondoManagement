<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\CuentaBanco;
use Form;
use Yajra\Datatables\Services\DataTable;

class CuentaBancoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.cuentaBancos.datatables_actions')
            ->editColumn('activo', function (CuentaBanco $row) {
                            return dt_check($row->activo);
                        })
            ->editColumn('fecha_saldo_actual', function (CuentaBanco $row) {
                if (!is_null($row->fecha_saldo_actual)){
                    return $row->fecha_saldo_actual->format('d-m-Y');
                }else{
                    return null;
                }

            })
            ->filterColumn('fecha_saldo_actual', function ($query, $keyword) {
                $query->whereRaw("COALESCE(DATE_FORMAT(fecha_saldo_actual,'%d-%m-%Y'),'00-00-0000') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    /**
     * Obtener el objeto query a ser procesado por datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cuentaBancos = CuentaBanco::select('com_cuenta_banco.*', 'com_cliente.nombre as nombre_cliente',
                        'com_org.nombre as nombre_org','com_tipo_cuenta_banco.nombre as nombre_tipo_cuenta_banco',
                        'com_entidad_bancaria.nombre as nombre_entidad_bancaria')
                    ->join('com_org', 'com_org.id', '=', 'com_cuenta_banco.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_cuenta_banco.com_cliente_id')
                    ->join('com_tipo_cuenta_banco',
                        'com_tipo_cuenta_banco.id', '=', 'com_cuenta_banco.com_tipo_cuenta_banco_id')
                    ->leftJoin('com_entidad_bancaria',
                        'com_entidad_bancaria.id', '=', 'com_cuenta_banco.com_tipo_cuenta_banco_id');

        return $this->applyScopes($cuentaBancos);
    }

    /**
     * Metodo opcional si se desea usar html builder
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px', 'title' => 'Acción', 'className'=>'text-center'])
            ->ajax('')
            ->parameters([
                //'dom' => 'lfrtip',
                'dom'   => '<"row" <"col-xs-12 col-sm-6 col-md-6"l><"col-xs-12 col-sm-6 col-md-6"f>>rtip',
                'language' => ['url' => asset('assets/global/plugins/DataTables-1.10.12/lang/es.json') ],
                'scrollX' => true,
                'buttons' => ['print','pdf','excel','csv','reload','colvis']
            ]);
    }

    /**
     * Obtener las columnas.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'cliente' => ['name' => 'com_cliente.nombre', 'data' => 'nombre_cliente', 'title' => 'Compañía'],
            'org'     => ['name' => 'com_org.nombre', 'data' => 'nombre_org', 'title' => 'Condominio'],
            'codigo' => ['name' => 'codigo', 'data' => 'codigo', 'title' => 'Código'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'tipo_cuenta_banco' => ['name' => 'com_tipo_cuenta_banco.nombre',
                'data' => 'nombre_tipo_cuenta_banco', 'title' => 'Tipo Cuenta'],
            'entidad_bancaria' => ['name' => 'com_entidad_bancaria.nombre',
                'data' => 'nombre_entidad_bancaria', 'title' => 'Banco'],
            'num_cuenta' => ['name' => 'num_cuenta', 'data' => 'num_cuenta', 'title' => 'Num. Cuenta'],
            'saldo_actual' => ['name' => 'saldo_actual',
                'data' => 'saldo_actual', 'title' => 'Saldo Actual'],
            'fecha_saldo_actual' => ['name' => 'fecha_saldo_actual', 'data' => 'fecha_saldo_actual',
                'title' => 'Fecha Saldo'],
            'saldo_inicial' => ['name' => 'saldo_inicial',
                'data' => 'saldo_inicial', 'title' => 'Saldo Inicial', 'visible' => false],
            'fecha_saldo_inicial' => ['name' => 'fecha_saldo_inicial',
                'data' => 'fecha_saldo_inicial', 'title' => 'Fecha Saldo Inicial', 'visible' => false],
            'activo'  => ['name' => 'activo', 'data' => 'activo',
                'title' => 'Estatus', 'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Obtener el nombre de archivo para exportar.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cuentaBancos';
    }
}
