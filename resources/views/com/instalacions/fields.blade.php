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
<div class="form-group col-sm-8 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control',
                                           'placeholder' => 'Nombre de la Instalación',
                                           'maxlength'   => '150',
                                           'title'       =>'Nombre de la Instalación',
                                           'required'    =>'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control',
                                           'placeholder' => 'Descripción',
                                           'maxlength'   => '20',
                                           'title'       =>'Descripción']) !!}
</div>

<div class="form-group col-sm-3 required">
    {!! Form::label('costo', 'Costo:', ['class' => 'control-label']) !!}
    {!! Form::number('costo', null, ['class' => 'form-control', 'maxlength' => '10',
                     'min' => '0', 'step' => '0.01', 'required'=>'required']) !!}
</div>
<div class="form-group col-sm-5 required">
    {!! Form::label('com_fondo_id', 'Fondo:', ['class' => 'control-label']) !!}
    {!! Form::select('com_fondo_id', $fondos, null,
        ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_fondo_id','style'=>'width: 100%', 'title'=>'Fondo'
    ]) !!}
</div>
<div class="form-group col-sm-2 required">
    {!! Form::label('hora_inicio', 'Hora Inicial:', ['class' => 'control-label']) !!}
    <div class="input-group">
        <input type="text" id="hora_inicio" name="hora_inicio"
               value="{!! old('hora_fin') !!}" title="Hora Inicial de Disponibilidad de la Instalación"
               class="form-control timepicker timepicker-no-seconds">
        <span class="input-group-btn">
            <button class="btn blue-hoki" type="button">
                <i class="fa fa-clock-o"></i>
            </button>
        </span>
    </div>
</div>
<div class="form-group col-sm-2 required">
    {!! Form::label('hora_fin', 'Hora Límite:', ['class' => 'control-label']) !!}
    <div class="input-group">
        <input type="text" id="hora_fin" name="hora_fin"
               value="{!! old('hora_fin') !!}" title="Hora Límite de Disponibilidad de la Instalación"
               class="form-control timepicker timepicker-no-seconds">
        <span class="input-group-btn">
            <button class="btn blue-hoki" type="button">
                <i class="fa fa-clock-o"></i>
            </button>
        </span>
    </div>
</div>

 {{--'bootstrap / Toggle Switch Reserva Morosos Field'--}}
<div class="form-group col-sm-12 required">
    {!! Form::label('reserva_morosos', 'Reserva a Morosos:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('reserva_morosos',false) !!}
    {!! Form::checkbox('reserva_morosos', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>


 {{--'bootstrap / Toggle Switch Activo Field'--}}
<div class="form-group col-sm-12 required">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!} <br>
    {!! Form::hidden('activo',false) !!}
    {!! Form::checkbox('activo', 1, true,  ['data-toggle' => 'toggle','data-size' => 'small',
                                                  'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                  'data-off' => 'No', 'data-offstyle' => 'danger',
                                                  'data-height' => '28', 'data-width' => '50']) !!}
</div>

