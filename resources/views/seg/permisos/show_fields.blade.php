<div class="form-group col-sm-6">
    {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $permiso->nombre_cliente !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $permiso->nombre_org !!}</span>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <span class="form-control">{!! $permiso->nombre !!}</span>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    <span class="form-control">{!! $permiso->slug !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <span class="form-control">{!! $permiso->descripcion !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('modelo', 'Modelo:') !!}
    <span class="form-control">{!! $permiso->modelo !!}</span>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}<br>
    {!! Form::checkbox('activo', $permiso->activo, $permiso->activo, ['data-toggle' => 'toggle',
                                                 'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                 'data-off' => 'No', 'data-offstyle' => 'danger',
                                                 'data-size' => 'normal',
                                                 'data-height' => '28',
                                                 'data-width' => '50','disabled' =>'disabled']) !!}
</div>