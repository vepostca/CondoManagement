{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->id !!}</span>
</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->cliente->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->org->nombre !!}</span>
</div>


<div class="form-group col-sm-4">
    {!! Form::label('dias_retraso', 'Días Retraso:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->dias_retraso !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('valor', 'Valor:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->valor !!}</span>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('tipo', 'Tipo:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->tipo !!}</span>
</div>


<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $recargo->activo, $recargo->activo, ['data-toggle' => 'toggle',
                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                 'data-size' => 'normal',
                                 'data-height' => '28',
                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>

{{--<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $recargo->updated_ip !!}</span>
</div>--}}


