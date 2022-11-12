<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $division->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $division->org->nombre !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <span class="form-control">{!! $division->codigo !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $division->nombre !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <span class="form-control">{!! $division->descripcion !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $division->activo, $division->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>
