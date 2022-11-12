<?php
namespace InnovaCondomi\DataTables\Tes;

use InnovaCondomi\Entities\Tes\Entidad;
use Form;
use Yajra\Datatables\Services\DataTable;

class EntidadDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'tes.entidads.datatables_actions')
            ->editColumn('activo', function (Entidad $row) {
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
        $entidads = Entidad::select('tes_entidad.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
                    ->join('com_org', 'com_org.id', '=', 'tes_entidad.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'tes_entidad.com_cliente_id');

        return $this->applyScopes($entidads);
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
            'com_cliente_id' => ['name' => 'com_cliente_id', 'data' => 'com_cliente_id', 'title' => 'com_cliente_id'],
            'com_org_id' => ['name' => 'com_org_id', 'data' => 'com_org_id', 'title' => 'com_org_id'],
            'title' => ['name' => 'title', 'data' => 'title', 'title' => 'title'],
            'cliente' => ['name' => 'cliente', 'data' => 'cliente', 'title' => 'cliente']
        ];
    }

    /**
     * Obtener el nombre de archivo para exportar.
     *
     * @return string
     */
    protected function filename()
    {
        return 'entidads';
    }
}
