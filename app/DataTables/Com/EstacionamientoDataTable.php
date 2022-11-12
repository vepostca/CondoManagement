<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Estacionamiento;
use Form;
use Yajra\Datatables\Services\DataTable;

class EstacionamientoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.estacionamientos.datatables_actions')
            ->editColumn('activo', function (Estacionamiento $row) {
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
        $estacionamientos = Estacionamiento::select('com_estacionamiento.*', 'com_cliente.nombre as nombre_cliente',
            'com_org.nombre as nombre_org','com_inmueble.nombre as nombre_inmueble')
                    ->join('com_org', 'com_org.id', '=', 'com_estacionamiento.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_estacionamiento.com_cliente_id')
                    ->join('com_inmueble', 'com_inmueble.id', '=', 'com_estacionamiento.com_inmueble_id');

        return $this->applyScopes($estacionamientos);
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
            'inmueble' => ['name' => 'com_inmueble.nombre', 'data' => 'nombre_inmueble', 'title' => 'Inmueble'],
            'placa' => ['name' => 'placa', 'data' => 'placa', 'title' => 'Placa'],
            'marca' => ['name' => 'marca', 'data' => 'marca', 'title' => 'Marca'],
            'modelo' => ['name' => 'modelo', 'data' => 'modelo', 'title' => 'Modelo'],
            'color' => ['name' => 'color', 'data' => 'color', 'title' => 'Color'],
            'Estatus' => ['name' => 'activo', 'data' => 'activo', 'title' => 'Estatus',
                'className' => 'text-center', 'width' => '50px']
        ];
    }

    /**
     * Obtener el nombre de archivo para exportar.
     *
     * @return string
     */
    protected function filename()
    {
        return 'estacionamientos';
    }
}
