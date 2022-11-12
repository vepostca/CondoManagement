{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->org->nombre !!}</span>
</div>


<div class="form-group col-sm-3">
    {!! Form::label('com_inmueble_id', 'Inmueble:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->inmueble->nombre !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('placa', 'Placa:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->placa !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('marca', 'Marca:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->marca !!}</span>
</div>
<div class="form-group col-sm-3">
    {!! Form::label('modelo', 'Modelo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->modelo !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('color', 'Color:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->color !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->observaciones !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $estacionamiento->$estacionamiento, $estacionamiento->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>


{{--
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $estacionamiento->updated_ip !!}</span>
</div>--}}
