<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\Instalacion;
use Form;
use Yajra\Datatables\Services\DataTable;

class InstalacionDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.instalacions.datatables_actions')
            ->editColumn('activo', function (Instalacion $row) {
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
        $instalacions = Instalacion::select('com_instalacion.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
                    ->join('com_org', 'com_org.id', '=', 'com_instalacion.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_instalacion.com_cliente_id')
                    ->join('com_fondo', 'com_fondo.id', '=', 'com_instalacion.com_fondo_id');

        return $this->applyScopes($instalacions);
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
            'codigo' => ['name' => 'codigo', 'data' => 'codigo', 'title' => 'Código'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre', 'title' => 'Nombre'],
            'costo' => ['name' => 'costo', 'data' => 'costo', 'title' => 'costo'],
            'reserva_morosos' => ['name' => 'reserva_morosos', 'data' => 'reserva_morosos', 'title' => 'Reserv a Morosos'],
            'fondo' => ['name' => 'com_fondo.nombre', 'data' => 'nombre_fondo', 'title' => 'Fondo'],
            'hora_inicio' => ['name' => 'hora_inicio', 'data' => 'hora_inicio', 'title' => 'Hora Inicial'],
            'hora_fin' => ['name' => 'hora_fin', 'data' => 'hora_fin', 'title' => 'Hora Límite'],
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
        return 'instalacions';
    }
}
