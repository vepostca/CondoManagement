<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Org;
use Form;
use Yajra\Datatables\Services\DataTable;

class OrgDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.orgs.datatables_actions')
            ->editColumn('activo', function (Org $row) {
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
        //$orgs = Org::query();
        $orgs = Org::select('com_org.*', 'com_cliente.nombre as nombre_cliente')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_org.com_cliente_id');

        return $this->applyScopes($orgs);
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
            ->addAction(['width' => '150px', 'title' => 'Acción', 'className'=>'text-center'])
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
            'codigo' => ['name' => 'com_org.codigo', 'data' => 'codigo'],
            'cliente' => ['name' => 'com_cliente.nombre', 'data' => 'nombre_cliente', 'title' => 'Compañía'],
            'nombre' => ['name' => 'com_org.nombre', 'data' => 'nombre', 'title' => 'Condominio'],
            'id_legal' => ['name' => 'com_org.id_legal', 'data' => 'id_legal'],
            'fecha_alta' => ['name' => 'com_org.fecha_alta', 'data' => 'fecha_alta'],
            'fecha_baja' => ['name' => 'com_org.fecha_baja', 'data' => 'fecha_baja', 'visible' => false],
            'estatus' => ['name' => 'com_org.activo', 'data' => 'activo', 'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orgs';
    }
}
