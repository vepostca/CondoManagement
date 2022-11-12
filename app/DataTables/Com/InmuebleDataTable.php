<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Inmueble;
use Form;
use Yajra\Datatables\Services\DataTable;

class InmuebleDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.inmuebles.datatables_actions')
            ->editColumn('activo', function (Inmueble $row) {
                return dt_check($row->activo);
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        //$inmuebles = Inmueble::query();
        $inmuebles = Inmueble::select('com_inmueble.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org',
            'com_division.nombre as nombre_division', 'com_tipo_inmueble.nombre as nombre_tipo_inmueble')
            ->join('com_org', 'com_org.id', '=', 'com_inmueble.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_inmueble.com_cliente_id')
            ->join('com_division', 'com_division.id', '=', 'com_inmueble.com_division_id')
            ->join('com_tipo_inmueble', 'com_tipo_inmueble.id', '=', 'com_inmueble.com_tipo_inmueble_id');

        return $this->applyScopes($inmuebles);
    }

    /**
     * Optional method if you want to use html builder.
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
//                'dom' => 'lfrtip',
                'dom'   => '<"row" <"col-xs-12 col-sm-6 col-md-6"l><"col-xs-12 col-sm-6 col-md-6"f>>rtip',
                'language' => ['url' => asset('assets/global/plugins/DataTables-1.10.12/lang/es.json') ],
                'scrollX' => false,
                'buttons' => ['print','pdf','excel','csv','reload','colvis']
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'cliente' => ['name' => 'com_cliente.nombre', 'data' => 'nombre_cliente', 'title' => 'Compañía'],
            'org'     => ['name' => 'com_org.nombre', 'data' => 'nombre_org', 'title' => 'Condominio'],
            'division'=> ['name' => 'com_division.nombre', 'data' => 'nombre_division', 'title' => 'División'],
            'codigo' => ['name' => 'codigo', 'data' => 'codigo', 'title' => 'Código'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'tipo_inmueble' => ['name' => 'com_tipo_inmueble.nombre', 'data' => 'nombre_tipo_inmueble',
                'title' => 'Tipo Inmueble'],
            'activo'  => ['name' => 'activo', 'data' => 'activo',
                'title' => 'Estatus', 'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'inmuebles';
    }
}
