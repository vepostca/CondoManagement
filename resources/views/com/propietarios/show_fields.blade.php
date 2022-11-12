{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->org->nombre !!}</span>
</div>


<div class="form-group col-sm-2">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->codigo !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('cedula_rif', 'Cédula/Rif:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->cedula_rif !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('nombres', 'Nombres:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->nombres !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('apellidos', 'Apellidos:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->apellidos !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->fecha_ingreso !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('fecha_egreso', 'Fecha Egreso:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->fecha_egreso !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Notas:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->descripcion !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->activo !!}</span>
</div>


{{--<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietario->updated_ip !!}</span>
</div>--}}


