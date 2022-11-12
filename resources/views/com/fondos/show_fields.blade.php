{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->cliente->nombre !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->org->nombre !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->codigo !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->nombre !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->descripcion !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('saldo', 'Saldo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->saldo !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $fondo->activo, $fondo->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>


{{--<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $fondo->updated_ip !!}</span>
</div>--}}


