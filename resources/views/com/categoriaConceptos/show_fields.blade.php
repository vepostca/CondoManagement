{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->cliente->nombre !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->org->nombre !!}</span>
</div>



<div class="form-group col-sm-4">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->codigo !!}</span>
</div>


<div class="form-group col-sm-5">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->nombre !!}</span>
</div>


<div class="form-group col-sm-3">
    {!! Form::label('siglas', 'Siglas:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->siglas !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:', ['class' => 'control-label']) !!}
    @if($categoriaConcepto->tipo == 1)
        <span class="form-control">Ingreso</span>
    @else
        <span class="form-control">Egreso</span>
    @endif
</div>


<div class="form-group col-sm-6">
    {!! Form::label('orden', 'Orden:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->orden !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->descripcion !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $categoriaConcepto->activo, $categoriaConcepto->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>


{{--
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $categoriaConcepto->updated_ip !!}</span>
</div>
--}}


