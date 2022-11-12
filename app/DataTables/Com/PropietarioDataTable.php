<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Propietario;
use Form;
use Yajra\Datatables\Services\DataTable;

class PropietarioDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.propietarios.datatables_actions')
            ->editColumn('activo', function (Propietario $row) {
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
        $propietarios = Propietario::select('com_propietario.*', 'com_cliente.nombre as nombre_cliente',
                    'com_org.nombre as nombre_org')
                    ->join('com_org', 'com_org.id', '=', 'com_propietario.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_propietario.com_cliente_id');

        return $this->applyScopes($propietarios);
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
            'cedula_rif' => ['name' => 'cedula_rif', 'data' => 'cedula_rif', 'title' => 'Cédula/Rif'],
            'nombres' => ['name' => 'nombres', 'data' => 'nombres', 'title' => 'Nombres'],
            'apellidos' => ['name' => 'apellidos', 'data' => 'apellidos', 'title' => 'Apellidos'],
            'fecha_ingreso' => ['name' => 'fecha_ingreso', 'data' => 'fecha_ingreso', 'title' => 'Fec. Ingreso'],
            'fecha_egreso' => ['name' => 'fecha_egreso', 'data' => 'fecha_egreso', 'title' => 'Fec. Egreso'],
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
        return 'propietarios';
    }
}
