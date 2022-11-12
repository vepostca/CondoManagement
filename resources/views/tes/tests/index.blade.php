@extends('layouts.app')

@section('content')
    <h1 class="page-title"> Responsive Extension
        <small>responsive extension demos</small>
    </h1>
<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Tests</span>
            </div>
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('tes.tests.create') !!}">Add New</a>
            </h1>
        </div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('tes.tests.table')
            </div>
        </div>
 </div>
@endsection

