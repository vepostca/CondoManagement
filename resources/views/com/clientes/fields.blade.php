<div class="row">
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
                                              'maxlength'   => '100',
                                              'title'       =>'Nombre',
                                              'required'    =>'required']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6 required">
        {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
        {!! Form::text('id_legal', null, ['class' => 'form-control',
                                              'placeholder' => 'Nro. de RIF',
                                              'maxlength'   => '15',
                                              'title'       =>'Registro de Información Fiscal (RIF)',
                                              'required'    =>'required']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control',
                                              'placeholder' => 'Descripción',
                                              'maxlength'   => '255',
                                              'title'       =>'Descripción']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12 required">
        {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
        {{--<label class="checkbox">--}}
        {!! Form::hidden('activo',false) !!}
        {!! Form::checkbox('activo', '1', true, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50']) !!}
        {{--</label>--}}
    </div>
</div>





