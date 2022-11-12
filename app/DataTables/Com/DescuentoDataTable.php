<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Descuento;
use Form;
use Yajra\Datatables\Services\DataTable;

class DescuentoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.descuentos.datatables_actions')
            ->editColumn('activo', function (Descuento $row) {
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
        $descuentos = Descuento::select('com_descuento.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
                    ->join('com_org', 'com_org.id', '=', 'com_descuento.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_descuento.com_cliente_id');

        return $this->applyScopes($descuentos);
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
            'dias_antes_pago' => ['name' => 'dias_antes_pago', 'data' => 'dias_antes_pago', 'title' => 'Días Antes de Pago'],
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
        return 'descuentos';
    }
}
