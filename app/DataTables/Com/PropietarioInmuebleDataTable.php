<?php
namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\PropietarioInmueble;
use Form;
use Yajra\Datatables\Services\DataTable;

class PropietarioInmuebleDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.propietarioInmuebles.datatables_actions')
            ->make(true);
    }

    /**
     * Obtener el objeto query a ser procesado por datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $propietarioInmuebles = PropietarioInmueble::select('com_propietario_inmueble.*',
                        'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org',
                        'com_tipo_propietario.nombre as nombre_tipo_propietario',
                        'com_propietario.nombres as nombre_propietario',
                        'com_propietario.apellidos as apellido_propietario',
                        'com_inmueble.codigo as codigo_inmueble', 'com_inmueble.nombre as nombre_inmueble')
                    ->join('com_org', 'com_org.id', '=', 'com_propietario_inmueble.com_org_id')
                    ->join('com_cliente', 'com_cliente.id', '=', 'com_propietario_inmueble.com_cliente_id')
                    ->join('com_propietario', 'com_propietario.id', '=', 'com_propietario_inmueble.com_propietario_id')
                    ->join('com_inmueble', 'com_inmueble.id', '=', 'com_propietario_inmueble.com_inmueble_id')
                    ->join('com_tipo_propietario', 'com_tipo_propietario.id', '=',
                        'com_propietario_inmueble.com_tipo_propietario_id');

        return $this->applyScopes($propietarioInmuebles);
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
            'nombre_inmueble' => ['name' => 'com_inmueble.nombre', 'data' => 'nombre_inmueble', 'title' => 'Inmueble'],
            'nombre_propietario' => ['name' => 'com_propietario.nombres', 'data' => 'nombre_propietario', 'title' => 'Nombre Prop.'],
            'apellido_propietario' => ['name' => 'com_propietario.apellidos', 'data' => 'apellido_propietario', 'title' => 'Apellido Prop.'],
            'tipo_propietario' => ['name' => 'com_tipo_propietario.nombre', 'data' => 'nombre_tipo_propietario',
                'title' => 'Tipo Prop.', 'className' => 'text-center'],
            'vive_aqui' => ['name' => 'vive_aqui', 'data' => 'vive_aqui',
                'title' => 'Vive Aquí', 'className' => 'text-center'],
            'contacto_principal' => ['name' => 'contacto_principal', 'data' => 'contacto_principal',
                'title' => 'Contacto Principal', 'className' => 'text-center'],
            'no_aplica_cuota' => ['name' => 'no_aplica_cuota', 'data' => 'no_aplica_cuota',
                'title' => 'No Aplica Cuota', 'className' => 'text-center']
        ];
    }

    /**
     * Obtener el nombre de archivo para exportar.
     *
     * @return string
     */
    protected function filename()
    {
        return 'propietarioInmuebles';
    }
}
