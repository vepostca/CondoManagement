{!! $dataTable->table(['id' => 'index_datatable', 'width' => '100%', 'class' =>'table table-bordered table-striped table-hover']) !!}

@section('datatable_scripts')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/DataTables-1.10.12/extensions/Buttons/css/buttons.bootstrap.min.css') }}">
    <script src="{{ asset('assets/global/plugins/DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection