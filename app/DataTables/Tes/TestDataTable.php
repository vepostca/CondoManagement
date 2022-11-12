<?php

namespace InnovaCondomi\DataTables\Tes;

use InnovaCondomi\Entities\Tes\Test;
use Form;
use Yajra\Datatables\Services\DataTable;

class TestDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'tes.tests.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $tests = Test::query();

        return $this->applyScopes($tests);
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
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'create',
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ]
                ]
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
            'title' => ['name' => 'title', 'data' => 'title'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'post_date' => ['name' => 'post_date', 'data' => 'post_date'],
            'words' => ['name' => 'words', 'data' => 'words'],
            'attachment' => ['name' => 'attachment', 'data' => 'attachment'],
            'post_type' => ['name' => 'post_type', 'data' => 'post_type'],
            'post_day' => ['name' => 'post_day', 'data' => 'post_day']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tests';
    }
}
