{!! Form::hidden('id',\Illuminate\Support\Facades\Request::input('id')) !!}
<div class="form-group col-sm-6 required">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    {!! Form::select('com_cliente_id', $clientes, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_cliente_id','style'=>'width: 100%'
    ]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $org->nombre !!}</span>
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('com_moneda_id', 'Moneda:', ['class' => 'control-label']) !!}
    {!! Form::select('com_moneda_id', $monedas, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_moneda_id','style'=>'width: 100%'
    ]) !!}
</div>

<div class="form-group col-sm-2 required">
    {!! Form::label('separador_decimal', 'Separador Decimal:', ['class' => 'control-label']) !!}
    {!! Form::select('separador_decimal', [',' => '(,) Coma', '.' => '(.) Punto'], null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'separador_decimal','style'=>'width: 100%'
    ]) !!}
</div>

<div class="form-group col-sm-4 required">
    {!! Form::label('num_dec_coeficiente', 'Cant. Decimales del Coeficiente:', ['class' => 'control-label']) !!}
    {!! Form::select('num_dec_coeficiente', ['1' => '1', '2' => '2', '3' => '3',
                     '4' => '4', '5' => '5', '6' => '6'], null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'num_dec_coeficiente','style'=>'width: 100%'])
    !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('com_tipo_calculo_cuota_id', 'Tipo Cálculo Cuotas:', ['class' => 'control-label']) !!}
    {!! Form::select('com_tipo_calculo_cuota_id', $tipoCalculoCuotas, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_tipo_calculo_cuota_id','style'=>'width: 100%'
    ]) !!}
</div>

{{--'bootstrap / Toggle Switch Activo Field'--}}
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                            'data-on' => 'Si', 'data-onstyle' => 'primary',
                                            'data-off' => 'No', 'data-offstyle' => 'danger',
                                            'data-height' => '28', 'data-width' => '50']) !!}
</div>

