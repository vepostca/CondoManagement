<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\TipoContactoWeb;
use Form;
use Yajra\Datatables\Services\DataTable;

class TipoContactoWebDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.tipo_contacto_webs.datatables_actions')
            ->editColumn('activo', function (TipoContactoWeb $row) {
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
        //$tipoContactoWebs = TipoContactoWeb::query();
        $tipoContactoWebs = TipoContactoWeb::select('com_tipo_contacto_web.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->join('com_org', 'com_org.id', '=', 'com_tipo_contacto_web.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_tipo_contacto_web.com_cliente_id');

        return $this->applyScopes($tipoContactoWebs);
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
            'codigo' => ['name' => 'codigo', 'data' => 'codigo', 'title' => 'Código'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'siglas' => ['name' => 'siglas', 'data' => 'siglas', 'title' => 'Siglas'],
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
        return 'tipoContactoWebs';
    }
}
