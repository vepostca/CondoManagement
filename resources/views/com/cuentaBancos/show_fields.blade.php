{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->org->nombre !!}</span>
</div>


<div class="form-group col-sm-2">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->codigo !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->nombre !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('com_tipo_cuenta_banco_id', 'Tipo Cuenta:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->com_tipo_cuenta_banco_id !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('com_entidad_bancaria_id', 'Banco:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->com_entidad_bancaria_id !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('num_cuenta', 'Num. Cuenta:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->num_cuenta !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('saldo_inicial', 'Saldo Inicial:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->saldo_inicial !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('fecha_saldo_inicial', 'Fecha Saldo Inicial:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->fecha_saldo_inicial !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('saldo_actual', 'Saldo Actual:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->saldo_actual !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('fecha_saldo_actual', 'Fecha Saldo Actual:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->fecha_saldo_actual !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->observaciones !!}</span>
</div>


<div class="form-group col-sm-2">
    {!! Form::label('activo', 'Activo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->activo !!}</span>
</div>


{{--<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $cuentaBanco->updated_ip !!}</span>
</div>--}}


