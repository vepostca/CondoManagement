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

<div class="form-group col-sm-3 required">
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
                                    'maxlength'   => '100',
                                    'title'       =>'Nombre',
                                    'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-3 required">
    {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
    {!! Form::text('id_legal', old('id_legal'), ['class' => 'form-control',
                                           'placeholder' => 'Registro de Información Fiscal',
                                           'maxlength'   => '20',
                                           'title'       =>'Registro de Información Fiscal',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('siglas', 'Siglas:', ['class' => 'control-label']) !!}
    {!! Form::text('siglas', old('siglas'), ['class' => 'form-control',
                                           'placeholder' => 'Siglas',
                                           'maxlength'   => '20',
                                           'title'       =>'Siglas']) !!}
</div>

<div class="form-group col-sm-9 required">
    {!! Form::label('pro_actividad_proveedor_id', 'Actividad Económica:', ['class' => 'control-label']) !!}
    {!! Form::select('pro_actividad_proveedor_id', $actividadesProveedor, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'pro_actividad_proveedor_id','style'=>'width: 100%']) !!}
</div>

<div class="form-group col-sm-12 required">
    {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control',
                                           'placeholder' => 'Observaciones',
                                           'maxlength'   => '255',
                                           'title'       =>'Observaciones']) !!}
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
