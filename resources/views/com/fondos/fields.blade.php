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
    {!! Form::text('codigo', null, ['class' => 'form-control',
                                           'placeholder' => 'Código',
                                           'maxlength'   => '10',
                                           'title'       =>'Código',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control',
                                           'placeholder' => 'Nombre',
                                           'maxlength'   => '150',
                                           'title'       =>'Nombre',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control',
                                           'placeholder' => 'Descripción',
                                           'maxlength'   => '255',
                                           'title'       =>'Descripción',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-6 required">
    {!! Form::label('saldo', 'Saldo:', ['class' => 'control-label']) !!}
    {!! Form::number('saldo', null, ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'max' => '100', 'step' => '0.01']) !!}
</div>

 {{--'bootstrap / Toggle Switch Activo Field'--}}
<div class="form-group col-sm-6 required">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>

