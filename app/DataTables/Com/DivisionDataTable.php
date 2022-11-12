<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Division;
use Form;
use Yajra\Datatables\Services\DataTable;

class DivisionDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.divisions.datatables_actions')
            ->editColumn('activo', function (Division $row) {
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
        //$divisions = Division::query();
        $divisions = Division::select('com_division.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->join('com_org', 'com_org.id', '=', 'com_division.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_division.com_cliente_id');


        return $this->applyScopes($divisions);
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
            'codigo'  => ['name' => 'com_division.codigo', 'data' => 'codigo', 'title' => 'Código'],
            'cliente' => ['name' => 'com_cliente.nombre', 'data' => 'nombre_cliente', 'title' => 'Compañía'],
            'org'     => ['name' => 'com_org.nombre', 'data' => 'nombre_org', 'title' => 'Condominio'],
            'nombre'  => ['name' => 'com_division.nombre', 'data' => 'nombre'],
            'activo'  => ['name' => 'com_division.activo', 'data' => 'activo',
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
        return 'divisions';
    }
}
