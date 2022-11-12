<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Region;
use Form;
use Yajra\Datatables\Services\DataTable;

class RegionDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.regions.datatables_actions')
            ->editColumn('activo', function (Region $row) {
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
        //$regions = Region::query();
        $regions = Region::select('com_region.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org',
            'com_pais.nombre as nombre_pais')
            ->join('com_org', 'com_org.id', '=', 'com_region.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_region.com_cliente_id')
            ->join('com_pais', 'com_pais.id', '=', 'com_region.com_pais_id');

        return $this->applyScopes($regions);
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
            'pais'     => ['name' => 'com_pais.nombre', 'data' => 'nombre_pais', 'title' => 'País'],
            'codigo' => ['name' => 'codigo', 'data' => 'codigo', 'title' => 'Código'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'siglas' => ['name' => 'siglas', 'data' => 'siglas', 'title' => 'Siglas'],
            'activo' => ['name' => 'activo', 'data' => 'activo', 'title' => 'Estatus']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'regions';
    }
}
