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
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                          'placeholder' => 'Nombre',
                                          'maxlength'   => '60',
                                          'title'       =>'Nombre',
                                          'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
    {!! Form::text('slug', old('slug'), ['class' => 'form-control',
                                          'placeholder' => 'Slug',
                                          'maxlength'   => '60',
                                          'title'       =>'Slug',
                                          'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:', ['class' => 'control-label']) !!}
    {!! Form::text('modelo', old('modelo'), ['class' => 'form-control',
                                          'placeholder' => 'Modelo',
                                          'maxlength'   => '255',
                                          'title'       =>'Modelo'
                                          ]) !!}
</div>

<div class="form-group col-sm-12">
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
    {!! Form::hidden('activo', false) !!}
    {!! Form::checkbox('activo', '1', null, ['data-toggle' => 'toggle',
                                             'data-on' => 'Si', 'data-onstyle' => 'primary',
                                             'data-off' => 'No', 'data-offstyle' => 'danger',
                                             'data-size' => 'normal',
                                             'data-height' => '28',
                                             'data-width' => '50']) !!}
    {{--</label>--}}
</div>
