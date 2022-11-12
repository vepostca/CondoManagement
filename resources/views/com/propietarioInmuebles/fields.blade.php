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
    {!! Form::label('com_inmueble_id', 'Inmueble:', ['class' => 'control-label']) !!}
    {!! Form::select('com_inmueble_id', $inmuebles, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'com_inmueble_id','style'=>'width: 100%']) !!}
</div>
<div class="form-group col-sm-6 required">
    {!! Form::label('com_propietario_id', 'Propietario:', ['class' => 'control-label']) !!}
    {!! Form::select('com_propietario_id', $propietarios, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'com_propietario_id','style'=>'width: 100%']) !!}
</div>
<div class="form-group col-sm-3 required">
    {!! Form::label('com_tipo_propietario_id', 'Tipo Propietario:', ['class' => 'control-label']) !!}
    {!! Form::select('com_tipo_propietario_id', $tiposPropietario, null,
                     ['class' => 'form-control select2', 'required'=>'required',
                      'id'=>'com_tipo_propietario_id','style'=>'width: 100%']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('observaciones', 'Observación:', ['class' => 'control-label']) !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control',
                                           'placeholder' => 'Observación',
                                           'maxlength'   => '255',
                                           'title'       =>'Observación']) !!}
</div>

 {{--'bootstrap / Toggle Switch Vive Aqui Field'--}}
<div class="form-group col-sm-4">
    {!! Form::label('vive_aqui', 'Vive Aquí:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('vive_aqui',false) !!}
    {!! Form::checkbox('vive_aqui', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>

 {{--'bootstrap / Toggle Switch Contacto Principal Field'--}}
<div class="form-group col-sm-4">
    {!! Form::label('contacto_principal', 'Contacto Principal:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('contacto_principal',false) !!}
    {!! Form::checkbox('contacto_principal', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>


 {{--'bootstrap / Toggle Switch No Aplica Cuota Field'--}}
<div class="form-group col-sm-4">
    {!! Form::label('no_aplica_cuota', 'No Aplica Cuota:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('no_aplica_cuota',false) !!}
    {!! Form::checkbox('no_aplica_cuota', 0, false,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>

