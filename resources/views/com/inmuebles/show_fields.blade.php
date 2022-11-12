<div class="form-group col-sm-6">
    {!! Form::label('nombre_cliente', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $inmueble->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nombre_condominio', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control" id="nombre_condominio">{!! $inmueble->org->nombre !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre_division', 'División:') !!}
    <span class="form-control">{!! $inmueble->division->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nombre_tipo_inmueble', 'Tipo Inmueble:') !!}
    <span class="form-control">{!! $inmueble->tipoInmueble->nombre !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <span class="form-control">{!! $inmueble->codigo !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $inmueble->nombre !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('coeficiente', 'Coeficiente:') !!}
    <span class="form-control">{!! $inmueble->coeficiente !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area (m²):') !!}
    <span class="form-control">{!! $inmueble->area !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $inmueble->activo, $inmueble->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>