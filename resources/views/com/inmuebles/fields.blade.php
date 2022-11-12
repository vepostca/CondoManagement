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

<div class="form-group col-sm-6 required">
    {!! Form::label('com_division_id', 'División:', ['class' => 'control-label']) !!}
    {!! Form::select('com_division_id', $divisiones, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_division_id','style'=>'width: 100%'
    ]) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('com_tipo_inmueble_id', 'Tipo Inmueble:', ['class' => 'control-label']) !!}
    {!! Form::select('com_tipo_inmueble_id', $tipoInmueble, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_tipo_inmueble_id','style'=>'width: 100%'
    ]) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control',
                                          'placeholder' => 'Código del Inmueble',
                                          'maxlength'   => '20',
                                          'title'       =>'Código del Inmueble',
                                          'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                          'placeholder' => 'Nombre del Inmueble',
                                          'maxlength'   => '50',
                                          'title'       =>'Nombre',
                                          'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('coeficiente', 'Coeficiente:', ['class' => 'control-label']) !!}
    {!! Form::text('coeficiente', old('coeficiente'), ['class' => 'form-control','id'=>'coeficiente',
                    'placeholder' => 'Coeficiente o Indiviso', 'required'=>'required',
                    'maxlength' => '20']) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('area', 'Área (m²):', ['class' => 'control-label']) !!}
    {!! Form::text('area', old('area'), ['class' => 'form-control',
                   'placeholder' => 'Área del Inmueble (m²)','required'=>'required',
                   'maxlength' => '20', 'id'=>'area']) !!}
</div>

<div class="form-group col-sm-12 required">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', '1', true, ['data-toggle' => 'toggle',
                                             'data-on' => 'Si', 'data-onstyle' => 'primary',
                                             'data-off' => 'No', 'data-offstyle' => 'danger',
                                             'data-size' => 'normal',
                                             'data-height' => '28',
                                             'data-width' => '50']) !!}
</div>

