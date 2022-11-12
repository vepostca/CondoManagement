@extends('layouts.app')

@section('htmlheader_title')Parámetros Condominio
@endsection

@section('content')
    @pageHeader('Parámetros Condominio.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('orgInfos',$orgInfo->id) !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Parámetros Condominio
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            @include('flash::message')
            <div class="form-body">
                @include('com.org_infos.show_fields')
            </div>
            <div class="clearfix"></div>
            {{--@pageFormActions('show','com.orgInfos.index')--}}
            <div class="form-actions" style="padding: 10px;">
                <div class="col-sm-12">
                    {!! Form::open(['route' => ['com.orgInfos.destroy', $orgInfo->id], 'method' => 'delete']) !!}
                    <a href="{!! route('com.orgInfos.edit',$orgInfo->id) !!}"
                       class="btn blue-hoki"><i class="fa fa-pencil"></i> Editar</a>


                    {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit',
                                     'class' => 'btn btn-danger', 'data-toggle'=>'tooltip',
                                     'data-title'=>'Eliminar', 'title'=>'Eliminar',
                                     'data-container'=>'body',
                                     'onclick' => "return confirm('¿Está seguro?')"
                        ])
                    !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection