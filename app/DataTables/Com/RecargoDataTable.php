<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Recargo;
use Form;
use Yajra\Datatables\Services\DataTable;

class RecargoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.recargos.datatables_actions')
            ->editColumn('activo', function (Recargo $row) {
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
        $recargos = Recargo::select('com_recargo.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
                    ->join('com_org', 'com_org.id', '=', 'com_recargo.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_recargo.com_cliente_id');

        return $this->applyScopes($recargos);
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
            'dias_retraso' => ['name' => 'dias_retraso', 'data' => 'dias_retraso', 'title' => 'Días Retraso'],
            'valor' => ['name' => 'valor', 'data' => 'valor', 'title' => 'Valor'],
            'tipo' => ['name' => 'tipo', 'data' => 'tipo', 'title' => 'Tipo'],
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
        return 'recargos';
    }
}
