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

<div class="form-group col-sm-3">
    {!! Form::label('com_inmueble_id', 'Inmueble:', ['class' => 'control-label']) !!}
    {!! Form::select('com_inmueble_id', $inmuebles, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'com_inmueble_id','style'=>'width: 100%']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('placa', 'Placa:', ['class' => 'control-label']) !!}
    {!! Form::text('placa', old('placa'), ['class' => 'form-control',
                                           'placeholder' => 'Placa',
                                           'maxlength'   => '15',
                                           'title'       =>'Placa',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('marca', 'Marca:', ['class' => 'control-label']) !!}
    {!! Form::text('marca', old('marca'),  ['class' => 'form-control',
                                           'placeholder' => 'Marca',
                                           'maxlength'   => '50',
                                           'title'       =>'Marca',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('modelo', 'Modelo:', ['class' => 'control-label']) !!}
    {!! Form::text('modelo', old('modelo'), ['class' => 'form-control',
                                           'placeholder' => 'Modelo',
                                           'maxlength'   => '50',
                                           'title'       =>'Modelo',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('color', 'Color:', ['class' => 'control-label']) !!}
    {!! Form::text('color', old('color'), ['class' => 'form-control',
                                           'placeholder' => 'Color',
                                           'maxlength'   => '50',
                                           'title'       =>'Color',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
    {!! Form::text('observaciones', old('observaciones'), ['class' => 'form-control',
                                           'placeholder' => 'Observaciones',
                                           'maxlength'   => '255',
                                           'title'       =>'Observaciones',
                                           'required'    =>'required']) !!}
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

