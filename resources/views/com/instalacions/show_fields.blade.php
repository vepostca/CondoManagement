{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->org->nombre !!}</span>
</div>


<div class="form-group col-sm-4">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->codigo !!}</span>
</div>
<div class="form-group col-sm-8">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->nombre !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estatusTarea->descripcion !!}</span>
</div>


<div class="form-group col-sm-3">
    {!! Form::label('costo', 'Costo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->costo !!}</span>
</div>
<div class="form-group col-sm-5">
    {!! Form::label('com_fondo_id', 'Fondo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->fondo->nombre !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('hora_inicio', 'Hora Inicial:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->hora_inicio !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('hora_fin', 'Hora Límite:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->hora_fin !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('reserva_morosos', 'Reserva Morosos:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->reserva_morosos !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->activo !!}</span>
</div>


{{--
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $instalacion->updated_ip !!}</span>
</div>


--}}
