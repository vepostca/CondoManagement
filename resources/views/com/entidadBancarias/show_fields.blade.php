{{--
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->id !!}</span>
</div>
--}}
<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->org->nombre !!}</span>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('codigo', 'Código:') !!}
    <span class="form-control">{!! $entidadBancaria->codigo !!}</span>
</div>
<div class="form-group col-sm-7">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $entidadBancaria->nombre !!}</span>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('siglas', 'Siglas:') !!}
    <span class="form-control">{!! $entidadBancaria->siglas !!}</span>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <span class="form-control">{!! $entidadBancaria->descripcion !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $entidadBancaria->activo, $entidadBancaria->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>


{{--
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $entidadBancaria->updated_ip !!}</span>
</div>


--}}
