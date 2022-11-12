
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
    {!! Form::label('codigo_iso', 'Código Iso:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo_iso', old('codigo_iso'), ['class' => 'form-control',
                                              'placeholder' => 'Código ISO',
                                              'maxlength'   => '10',
                                              'title'       =>'Código ISO',
                                              'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-7 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                          'placeholder' => 'Nombre',
                                          'maxlength'   => '100',
                                          'title'       =>'Nombre',
                                          'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-2 required">
    {!! Form::label('simbolo', 'Símbolo:', ['class' => 'control-label']) !!}
    {!! Form::text('simbolo', old('simbolo'), ['class' => 'form-control',
                                          'placeholder' => 'Símbolo',
                                          'maxlength'   => '10',
                                          'title'       =>'Símbolo',
                                          'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control',
                                          'placeholder' => 'Descripción',
                                          'maxlength'   => '255',
                                          'title'       =>'Descripción'
                                          ]) !!}
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
