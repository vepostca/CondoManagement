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

<div class="form-group col-sm-4 required">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control',
                                          'placeholder' => 'Código',
                                          'maxlength'   => '10',
                                          'title'       =>'Código',
                                          'required'    =>'required']) !!}
</div>


<div class="form-group col-sm-5 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                    'placeholder' => 'Nombre',
                                    'maxlength'   => '100',
                                    'title'       =>'Nombre',
                                    'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('siglas', 'Siglas:', ['class' => 'control-label']) !!}
    {!! Form::text('siglas', old('siglas'), ['class' => 'form-control',
                                           'placeholder' => 'Siglas',
                                           'maxlength'   => '20',
                                           'title'       =>'Siglas']) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('tipo', 'Tipo:', ['class' => 'control-label']) !!}
    {!! Form::select('tipo', ['1' => 'Ingreso', '-1' => 'Egreso'], null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'tipo','style'=>'width: 100%']) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('orden', 'Orden:', ['class' => 'control-label']) !!}
    {!! Form::number('orden', old('orden'), ['class' => 'form-control',
                    'placeholder' => 'Ordenamiento para el ítem',
                    'min' => '1', 'max'=>'50', 'step'=>'1']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control',
                                           'placeholder' => 'Descripción',
                                           'maxlength'   => '255',
                                           'title'       =>'Descripción']) !!}
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

