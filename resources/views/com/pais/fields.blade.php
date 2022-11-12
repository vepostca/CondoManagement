<div class="row">
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
</div>

<div class="row">
    <div class="form-group col-sm-6 required">
        {!! Form::label('codigo_iso2', 'Código ISO2:', ['class' => 'control-label']) !!}
        {!! Form::text('codigo_iso2', null, ['class' => 'form-control',
                                              'placeholder' => 'Código ISO2',
                                              'maxlength'   => '2',
                                              'title'       =>'Código ISO2',
                                              'required'    =>'required']) !!}
    </div>
    <div class="form-group col-sm-6 required">
        {!! Form::label('codigo_iso3', 'Código ISO3:', ['class' => 'control-label']) !!}
        {!! Form::text('codigo_iso3', null, ['class' => 'form-control',
                                              'placeholder' => 'Codigo ISO3',
                                              'maxlength'   => '3',
                                              'title'       =>'Codigo ISO3',
                                              'required'    =>'required']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6 required">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control',
                                              'placeholder' => 'Nombre',
                                              'maxlength'   => '60',
                                              'title'       =>'Nombre',
                                              'required'    =>'required']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('codigo_telefonico', 'Código Telefónico:') !!}
        {!! Form::text('codigo_telefonico', null, ['class' => 'form-control',
                                              'placeholder' => 'Codigo Telefónico',
                                              'maxlength'   => '10',
                                              'title'       =>'Codigo Telefónico',
                                              'required'    =>'required']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6 required">
        {!! Form::label('tiene_region', 'Tiene Región:',['class' => 'control-label']) !!}<br>
        {!! Form::hidden('activo',false) !!}
        {!! Form::checkbox('tiene_region', '1', null, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('nombre_region', 'Nombre Región:', ['class' => 'control-label']) !!}
        {!! Form::text('nombre_region', null, ['class' => 'form-control',
                                              'placeholder' => 'Nombre Región',
                                              'maxlength'   => '50',
                                              'title'       =>'Nombre Región']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control',
                                              'placeholder' => 'Descripción',
                                              'maxlength'   => '255',
                                              'title'       =>'Descripción'
                                              ]) !!}
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