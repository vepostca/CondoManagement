<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $orgInfo->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $org->nombre !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('moneda', 'Moneda:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $orgInfo->moneda->nombre . ' (' .
                                   $orgInfo->moneda->codigo_iso . ' - ' .
                                   $orgInfo->moneda->simbolo . ')' !!}</span>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('separador_decimal', 'Separador Decimal:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $orgInfo->separador_decimal !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('num_dec_coeficiente', 'Cant. Decimales del Coeficiente:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $orgInfo->num_dec_coeficiente !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('com_tipo_calculo_cuota', 'Tipo Cálculo Cuotas:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $orgInfo->tipoCalculoCuota->nombre !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
    <label class="checkbox-inline" style="padding-left:0px">
        {!! Form::checkbox('activo', $orgInfo->activo , $orgInfo->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50', 'disabled' => 'disabled']) !!}
    </label>
</div>
{{--
<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{!! $orgInfo->created_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orgInfo->created_at !!}</p>
</div>

<!-- Created Ip Field -->
<div class="form-group">
    {!! Form::label('created_ip', 'Created Ip:') !!}
    <p>{!! $orgInfo->created_ip !!}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{!! $orgInfo->updated_by !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orgInfo->updated_at !!}</p>
</div>

<!-- Updated Ip Field -->
<div class="form-group">
    {!! Form::label('updated_ip', 'Updated Ip:') !!}
    <p>{!! $orgInfo->updated_ip !!}</p>
</div>--}}

