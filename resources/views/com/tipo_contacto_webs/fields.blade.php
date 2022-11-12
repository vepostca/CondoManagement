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
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control',
                                          'placeholder' => 'Código',
                                          'maxlength'   => '20',
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

<div class="form-group col-sm-6 required">
    {!! Form::label('siglas', 'Siglas:', ['class' => 'control-label']) !!}
    {!! Form::text('siglas', old('siglas'), ['class' => 'form-control',
                                          'placeholder' => 'Siglas',
                                          'maxlength'   => '20',
                                          'title'       =>'Siglas',
                                          'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control',
                                          'placeholder' => 'Descripción',
                                          'maxlength'   => '255',
                                          'title'       =>'Descripción'
                                          ]) !!}
</div>

<div class="form-group col-sm-12 required">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
    {{--<label class="checkbox">--}}
    {{--{!! Form::hidden('activo', false) !!}--}}
    {!! Form::checkbox('activo', '1', old('activo'), ['data-toggle' => 'toggle',
                                             'data-on' => 'Si', 'data-onstyle' => 'primary',
                                             'data-off' => 'No', 'data-offstyle' => 'danger',
                                             'data-size' => 'normal',
                                             'data-height' => '28',
                                             'data-width' => '50']) !!}
    {{--</label>--}}
</div>