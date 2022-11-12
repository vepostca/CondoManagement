<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $tipoCalculoCuota->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $tipoCalculoCuota->org->nombre !!}</span>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('codigo', 'Código:') !!}
    <span class="form-control">{!! $tipoCalculoCuota->codigo !!}</span>
</div>
<div class="form-group col-sm-7">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $tipoCalculoCuota->nombre !!}</span>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('siglas', 'Siglas:') !!}
    <span class="form-control">{!! $tipoCalculoCuota->siglas !!}</span>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <span class="form-control">{!! $tipoCalculoCuota->descripcion !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $tipoCalculoCuota->activo, $tipoCalculoCuota->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>