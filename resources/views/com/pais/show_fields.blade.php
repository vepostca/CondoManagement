<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $pais->nombre_cliente !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $pais->nombre_org !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-2">
        {!! Form::label('codigo_iso2', 'Código ISO2:') !!}
        <span class="form-control">{!! $pais->codigo_iso2 !!}</span>
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('codigo_iso3', 'Código ISO3:') !!}
        <span class="form-control">{!! $pais->codigo_iso3 !!}</span>
    </div>
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre:') !!}
        <span class="form-control">{!! $pais->nombre !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción:') !!}
        <span class="form-control">{!! $pais->descripcion !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('codigo_telefonico', 'Código Telefónico:') !!}
        <span class="form-control">{!! $pais->codigo_telefonico !!}</span>
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('tiene_region', 'Tiene Región:') !!}<br>
        {!! Form::checkbox('tiene_region', $pais->tiene_region, $pais->tiene_region, ['data-toggle' => 'toggle',
                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                     'data-size' => 'normal',
                                                     'data-height' => '34',
                                                     'data-width' => '50','disabled' =>'disabled']) !!}
    </div>
    <div class="form-group col-sm-5">
        {!! Form::label('nombre_region', 'Nombre Región:') !!}
        <span class="form-control">{!! $pais->nombre_region !!}</span>
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('activo', 'Activo:') !!}<br>
        {!! Form::checkbox('activo', $pais->activo, $pais->activo, ['data-toggle' => 'toggle',
                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                     'data-size' => 'normal',
                                                     'data-height' => '34',
                                                     'data-width' => '50','disabled' =>'disabled']) !!}
    </div>
</div>
