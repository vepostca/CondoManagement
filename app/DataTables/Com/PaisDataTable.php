<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Pais;
use Form;
use Yajra\Datatables\Services\DataTable;

class PaisDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.pais.datatables_actions')
            ->editColumn('activo', function (Pais $row) {
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
        //$pais = Pais::query();
        $pais = Pais::select('com_pais.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->join('com_org', 'com_org.id', '=', 'com_pais.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_pais.com_cliente_id');

        return $this->applyScopes($pais);
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
            'codigo_iso2' => ['name' => 'com_pais.codigo_iso2', 'data' => 'codigo_iso2', 'title' => 'Cod. ISO2'],
            'codigo_iso3' => ['name' => 'com_pais.codigo_iso3', 'data' => 'codigo_iso3', 'title' => 'Cod. ISO3'],
            'com_cliente' => ['name' => 'com_cliente.nombre', 'data' => 'nombre_cliente', 'title' => 'Compañía'],
            'com_org'     => ['name' => 'com_org.nombre', 'data' => 'nombre_org', 'title' => 'Condominio'],
            'nombre' => ['name' => 'com_pais.nombre', 'data' => 'nombre', 'title' => 'País'],
            'codigo_telefonico' => ['name' => 'com_pais.codigo_telefonico', 'data' => 'codigo_telefonico',
                                    'title' => 'Cód. Telefónico', 'visible' => false],
            'tiene_region' => ['name' => 'com_pais.tiene_region', 'data' => 'tiene_region', 'title' => 'Tiene Región'],
            'nombre_region' => ['name' => 'com_pais.nombre_region', 'data' => 'nombre_region', 'title' => 'Nombre Región'],
            'activo' => ['name' => 'com_pais.activo', 'data' => 'activo', 'title' => 'Estatus', 'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pais';
    }
}
