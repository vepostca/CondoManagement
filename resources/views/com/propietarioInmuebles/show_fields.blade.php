{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->org->nombre !!}</span>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('com_inmueble_id', 'Inmueble:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->inmueble->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_propietario_id', 'Propietario:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->propietario->nombres !!}</span>
</div>
<div class="form-group col-sm-3">
    {!! Form::label('com_tipo_propietario_id', 'Tipo Propietario:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->tipoPropietario->nombre !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Observacion:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->observaciones !!}</span>
</div>

{{--
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->activo !!}</span>
</div>
--}}

<div class="form-group col-sm-4">
    {!! Form::label('vive_aqui', 'Vive Aquí:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->vive_aqui !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('contacto_principal', 'Contacto Principal:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->contacto_principal !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('no_aplica_cuota', 'No Aplica Cuota:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->no_aplica_cuota !!}</span>
</div>


{{--<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $propietarioInmueble->updated_ip !!}</span>
</div>--}}


