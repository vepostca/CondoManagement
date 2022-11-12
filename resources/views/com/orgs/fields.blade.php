
<div class="form-group col-sm-6 required">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    {!! Form::select('com_cliente_id', $clientes, null,
    ['class' => 'form-control select2', 'required'=>'required',
        'id'=>'com_cliente_id','style'=>'width: 100%'
    ]) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
    {!! Form::text('codigo', null, ['class' => 'form-control',
                                          'placeholder' => 'Código',
                                          'maxlength'   => '50',
                                          'title'       =>'Código',
                                          'required'    =>'required']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control',
                                          'placeholder' => 'Nombre',
                                          'maxlength'   => '50',
                                          'title'       =>'Nombre',
                                          'required'    =>'required']) !!}
</div>

<!-- Id Legal Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
    {!! Form::text('id_legal', null, ['class' => 'form-control',
                                          'placeholder' => 'Nro. de RIF',
                                          'maxlength'   => '15',
                                          'title'       =>'Registro de Información Fiscal (RIF)',
                                          'required'    =>'required']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control',
                                          'placeholder' => 'Descripción',
                                          'maxlength'   => '255',
                                          'title'       =>'Descripción'
                                          ]) !!}
</div>

<!-- Fecha Alta Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('fecha_alta', 'Fecha Ingreso:',['class' => 'control-label']) !!}
    {!! Form::date('fecha_alta', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-12 required">
    {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null, ['data-toggle' => 'toggle',
                                                                      'data-on' => 'Si',
                                                                      'data-off' => 'No',
                                                                      'data-size' => 'normal',
                                                                      'data-height' => '28',
                                                                      'data-width' => '50']) !!}
    </label>
</div>