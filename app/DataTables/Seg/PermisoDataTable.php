<?php

namespace InnovaCondomi\DataTables\Seg;

use InnovaCondomi\Entities\Seg\Permiso;
use Form;
use Yajra\Datatables\Services\DataTable;

class PermisoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'seg.permisos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        //$permisos = Permiso::query();
        $permisos = Permiso::select('seg_permiso.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->join('com_org', 'com_org.id', '=', 'seg_permiso.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'seg_permiso.com_cliente_id');

        return $this->applyScopes($permisos);
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
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'slug' => ['name' => 'slug', 'data' => 'slug', 'title' => 'Slug'],
            'modelo' => ['name' => 'modelo', 'data' => 'modelo', 'title' => 'Entidad'],
            'activo'  => ['name' => 'com_tipo_calculo_cuota.activo', 'data' => 'activo',
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
        return 'permisos';
    }
}
