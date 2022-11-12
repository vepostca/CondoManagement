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

<div class="form-group col-sm-2 required">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control',
                                          'placeholder' => 'Código',
                                          'maxlength'   => '10',
                                          'title'       =>'Código',
                                          'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                          'placeholder' => 'Nombre',
                                          'maxlength'   => '60',
                                          'title'       =>'Nombre',
                                          'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-4 required">
    {!! Form::label('com_tipo_cuenta_banco_id', 'Tipo Cuenta:', ['class' => 'control-label']) !!}
    {!! Form::select('com_tipo_cuenta_banco_id', $tiposCuentaBanco, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'com_tipo_cuenta_banco_id','style'=>'width: 100%']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('com_entidad_bancaria_id', 'Banco:', ['class' => 'control-label']) !!}
    {!! Form::select('com_entidad_bancaria_id', $bancos, null,
                     ['class' => 'form-control select2',
                      'id'=>'com_entidad_bancaria_id','style'=>'width: 100%']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('num_cuenta', 'Num. Cuenta:', ['class' => 'control-label']) !!}
    {!! Form::text('num_cuenta', null, ['class' => 'form-control',
                                           'placeholder' => 'Número de Cuenta',
                                           'maxlength'   => '30',
                                           'title'       =>'Número de Cuenta'
                                           ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('saldo_inicial', 'Saldo Inicial:', ['class' => 'control-label']) !!}
    {!! Form::number('saldo_inicial', null, ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'max' => '100', 'step' => '0.01']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('fecha_saldo_inicial', 'Fecha Saldo Inicial:', ['class' => 'control-label']) !!}
    {!! Form::date('fecha_saldo_inicial', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('saldo_actual', 'Saldo Actual:', ['class' => 'control-label']) !!}
    {!! Form::number('saldo_actual', null, ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'max' => '100', 'step' => '0.01', 'disabled' => 'disabled']) !!}
</div>

{{-- Fecha Saldo Actual Field --}}
<div class="form-group col-sm-6">
    {!! Form::label('fecha_saldo_actual', 'Fecha Saldo Actual:', ['class' => 'control-label']) !!}
    {!! Form::date('fecha_saldo_actual', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => '3',
                       'placeholder' => 'Observaciones','maxlength'   => '255',
                       'title'       =>'Observaciones'
                       ]) !!}
</div>

 {{--'bootstrap / Toggle Switch Activo Field'--}}
<div class="form-group col-sm-2">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>

