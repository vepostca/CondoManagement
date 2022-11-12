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
    {!! Form::text('codigo', null, ['class' => 'form-control',
                                           'placeholder' => 'Código',
                                           'maxlength'   => '10',
                                           'title'       =>'Código',
                                           'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-2 required">
    {!! Form::label('cedula_rif', 'Cédula/Rif:', ['class' => 'control-label']) !!}
    {!! Form::text('cedula_rif', null, ['class' => 'form-control',
                                           'placeholder' => 'Cédula/Rif',
                                           'maxlength'   => '20',
                                           'title'       =>'Cédula/Rif',
                                           'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-4 required">
    {!! Form::label('nombres', 'Nombres:', ['class' => 'control-label']) !!}
    {!! Form::text('nombres', null, ['class' => 'form-control',
                                           'placeholder' => 'Nombres',
                                           'maxlength'   => '20',
                                           'title'       =>'Nombres',
                                           'required'    =>'required']) !!}
</div>
<div class="form-group col-sm-4 required">
    {!! Form::label('apellidos', 'Apellidos:', ['class' => 'control-label']) !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control',
                                           'placeholder' => 'Apellidos',
                                           'maxlength'   => '20',
                                           'title'       =>'Apellidos',
                                           'required'    =>'required']) !!}
</div>

{{-- Fecha Ingreso Field --}}
<div class="form-group col-sm-6 required">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:', ['class' => 'control-label']) !!}
    {!! Form::date('fecha_ingreso', null, ['class' => 'form-control', 'title' => 'Apellidos',
                                          'required' => 'required']) !!}
</div>
{{-- Fecha Egreso Field --}}
<div class="form-group col-sm-6">
    {!! Form::label('fecha_egreso', 'Fecha Egreso:', ['class' => 'control-label']) !!}
    {!! Form::date('fecha_egreso', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Notas:', ['class' => 'control-label']) !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control',
                                           'placeholder' => 'Notas',
                                           'maxlength'   => '255',
                                           'title'       =>'Notas']) !!}
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

