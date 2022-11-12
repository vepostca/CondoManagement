<?php
namespace InnovaCondomi\DataTables\Pro;

use InnovaCondomi\Entities\Pro\Proveedor;
use Form;
use Yajra\Datatables\Services\DataTable;

class ProveedorDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'pro.proveedors.datatables_actions')
            ->editColumn('activo', function (Proveedor $row) {
                            return dt_check($row->activo);
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
        $proveedors = Proveedor::select('pro_proveedor.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org',
                                        'pro_actividad_proveedor.nombre as nombre_actividad')
                    ->join('com_org', 'com_org.id', '=', 'pro_proveedor.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'pro_proveedor.com_cliente_id')
                    ->join('pro_actividad_proveedor', 'pro_actividad_proveedor.id', '=', 'pro_proveedor.pro_actividad_proveedor_id');

        return $this->applyScopes($proveedors);
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
                'scrollX' => false,
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
            'id_legal' => ['name' => 'id_legal', 'data' => 'id_legal', 'title' => 'RIF'],
            'siglas' => ['name' => 'siglas', 'data' => 'siglas', 'title' => 'Siglas'],
            'pro_actividad_proveedor_id' => ['name' => 'pro_actividad_proveedor.nombre',
                                             'data' => 'nombre_actividad', 'title' => 'Actividad'],
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
        return 'proveedor';
    }
}
