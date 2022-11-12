<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $moneda->nombre_cliente !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $moneda->nombre_org !!}</span>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('codigo_iso', 'Código ISO:') !!}
    <span class="form-control">{!! $moneda->codigo_iso !!}</span>
</div>
<div class="form-group col-sm-7">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $moneda->nombre !!}</span>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('simbolo', 'Símbolo:') !!}
    <span class="form-control">{!! $moneda->simbolo !!}</span>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <span class="form-control">{!! $moneda->descripcion !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $moneda->activo, $moneda->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>