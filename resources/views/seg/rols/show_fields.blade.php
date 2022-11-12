    <div class="form-group col-sm-6">
        {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $rol->nombre_cliente !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $rol->nombre_org !!}</span>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        <span class="form-control">{!! $rol->nombre !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('slug', 'Slug:') !!}
        <span class="form-control">{!! $rol->slug !!}</span>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('nivel_jerarquia', 'Nivel Jerarquía:') !!}
        <span class="form-control">{!! $rol->nivel_jerarquia !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('nivel_acceso', 'Nivel Acceso:') !!}
        <span class="form-control">
            @if ($rol->nivel_acceso == 'S--')
                Sistema
            @elseif($rol->nivel_acceso == 'SC-')
                Sistema/Compañía
            @elsefi($rol->nivel_acceso == '-CO')
                Compañía/Condominio
            @elseif($rol->nivel_acceso == '--O')
                Condominio
            @endif
        </span>
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción:') !!}
        <span class="form-control">{!! $rol->descripcion !!}</span>
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('activo', 'Activo:') !!}<br>
        {!! Form::checkbox('activo', $rol->activo, $rol->activo, ['data-toggle' => 'toggle',
                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                     'data-size' => 'normal',
                                                     'data-height' => '28',
                                                     'data-width' => '50','disabled' =>'disabled']) !!}
    </div>
