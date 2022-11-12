@extends('layouts.app')

@section('content')
 <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Test</span>
            </div>
        </div>
        <div>
            @include('metronic-templates::common.errors')
        </div>
        <div class="portlet-body form">
            <div class="row">
                {!! Form::open(['route' => 'tes.tests.store']) !!}

                    @include('tes.tests.fields')

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
@endsection
@section('scripts')
    @parent
    <script language="JavaScript">
        var romm=9;
    </script>
@endsection
