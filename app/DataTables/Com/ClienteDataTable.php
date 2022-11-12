<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Cliente;
use Form;
use Yajra\Datatables\Services\DataTable;

class ClienteDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.clientes.datatables_actions')
            ->editColumn('activo', function (Cliente $row) {
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
        $clientes = Cliente::query();
        return Cliente::query();
        //return $this->applyScopes($clientes);
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
            'código' => ['name' => 'codigo', 'data' => 'codigo'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'RIF' => ['name' => 'id_legal', 'data' => 'id_legal'],
            'fecha.creación' => ['name' => 'created_at', 'data' => 'created_at'],
            'fecha.modificación' => ['name' => 'updated_at', 'data' => 'updated_at', 'visible' => false],
            'Estatus' => ['name' => 'activo', 'data' => 'activo', 'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'companias';
    }
}
