<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $region->nombre_cliente !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $region->nombre_org !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('com_pais_id', 'País:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $region->nombre_pais !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <span class="form-control">{!! $region->codigo !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $region->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('siglas', 'Siglas:') !!}
    <span class="form-control">{!! $region->siglas !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <span class="form-control">{!! $region->descripcion !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $region->activo, $region->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>