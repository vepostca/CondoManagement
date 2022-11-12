<?php

namespace InnovaCondomi\DataTables\Com;

use InnovaCondomi\Entities\Com\OrgInfo;
use Form;
use Yajra\Datatables\Services\DataTable;

class OrgInfoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'com.org_infos.datatables_actions')
            ->editColumn('activo', function (OrgInfo $row) {
                return dt_check($row->activo);
            })
            ->filterColumn('nombre_moneda', function($query, $keyword) {
                $query->whereRaw("CONCAT(com_moneda.nombre, ' (', com_moneda.codigo_iso,' - ',com_moneda.simbolo,')') like ?", ["%{$keyword}%"]);
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
        //$orgInfos = OrgInfo::query();
        $orgInfos = OrgInfo::select('com_org_info.*', 'com_cliente.nombre as nombre_cliente',
            'com_org.nombre as nombre_org',
            \DB::raw("CONCAT(com_moneda.nombre, ' (', com_moneda.codigo_iso,' - ',com_moneda.simbolo,')') as nombre_moneda"),
            'com_tipo_calculo_cuota.nombre as nombre_tipo_calculo_cuota')
            ->join('com_org', 'com_org.id', '=', 'com_org_info.id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_org_info.com_cliente_id')
            ->join('com_moneda', 'com_moneda.id', '=', 'com_org_info.com_moneda_id')
            ->join('com_tipo_calculo_cuota', 'com_tipo_calculo_cuota.id', '=', 'com_org_info.com_tipo_calculo_cuota_id');


        return $this->applyScopes($orgInfos);
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
            'com_moneda_id' => ['name' => 'nombre_moneda', 'data' => 'nombre_moneda', 'title' => 'Moneda'],
            'tipo_calculo_cuota' => ['name' => 'com_tipo_calculo_cuota.nombre',
                                     'data' => 'nombre_tipo_calculo_cuota', 'title' => 'Cálculo Cuota'],
            'separador_decimal' => ['name' => 'separador_decimal',
                'data' => 'separador_decimal', 'title'=>'Sep. Decimal'],
            'num_dec_coeficiente' => ['name' => 'num_dec_coeficiente', 'data' => 'num_dec_coeficiente',
                'title' => 'Cant. Decimales Coef.'],
            'activo' => ['name' => 'activo', 'data' => 'activo']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orgInfos';
    }
}
