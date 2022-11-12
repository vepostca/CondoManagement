<div class="form-group col-sm-6 required">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    {!! Form::select('com_cliente_id', $clientes, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_cliente_id','style'=>'width: 100%'
    ]) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    {!! Form::select('com_org_id', $orgs, null,
        ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_org_id','style'=>'width: 100%'
    ]) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('dias_antes_pago', 'Días Antes Pago:', ['class' => 'control-label']) !!}
    {!! Form::number('dias_antes_pago', old('dias_antes_pago'), ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'max' => '365', 'step' => '1']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('valor', 'Valor:', ['class' => 'control-label']) !!}
    {!! Form::number('valor', old('valor'), ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'max' => '100', 'step' => '0.01']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('tipo', 'Tipo:', ['class' => 'control-label']) !!}
    {!! Form::select('tipo', ['Porcentaje' => 'Porcentaje', 'Importe' => 'Importe'], null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'tipo','style'=>'width: 100%']) !!}
</div>

 {{--'bootstrap / Toggle Switch Activo Field'--}}
<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                            'data-on' => 'Si', 'data-onstyle' => 'primary',
                                            'data-off' => 'No', 'data-offstyle' => 'danger',
                                            'data-height' => '28', 'data-width' => '50']) !!}
</div>

