{{--<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->id !!}</span>
</div>--}}

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('com_cliente_id', 'Compañía:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->cliente->nombre !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->org->nombre !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->codigo !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->nombre !!}</span>
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->id_legal !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('siglas', 'Siglas:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->siglas !!}</span>
    </div>
    <div class="form-group col-sm-9">
        {!! Form::label('pro_actividad_proveedor_id', 'Actividad Económica:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->actividadProveedor->nombre !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('observaciones', 'Observaciones:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $proveedor->observaciones !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('activo', 'Activo:') !!}<br>
        {!! Form::checkbox('activo', $proveedor->activo, $proveedor->activo, ['data-toggle' => 'toggle',
                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                     'data-size' => 'normal',
                                                     'data-height' => '28',
                                                     'data-width' => '50','disabled' =>'disabled']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="font-blue-hoki"><i class="fa fa-map-marker"></i>  <b>Direcciones:</b></h4>
        <div class="flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                <tr>
                    <th width="10%"> Tipo </th>
                    <th width="15%"> País </th>
                    <th width="15%"> Región </th>
                    <th width="15%"> Ciudad </th>
                    <th width="40%"> Dirección </th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedor->direcciones as $direccion)
                    <tr>
                        <td>{!! $direccion->tipoDireccion->nombre !!}</td>
                        <td>{!! $direccion->pais->nombre !!}</td>
                        <td>{!! $direccion->region->nombre !!}</td>
                        <td>{!! $direccion->ciudad !!}</td>
                        <td>{!! $direccion->linea_dir !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="font-blue-hoki"><i class="fa fa-phone"></i>  <b>Contactos Telefónicos:</b></h4>
        <div class="flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                <tr>
                    <th width="20%"> Tipo </th>
                    <th width="10%"> Cód. Área </th>
                    <th width="15%"> Nro. Teléfono </th>
                    <th width="10%" class="text-center"> Principal </th>
                    <th width="45%"> Notas </th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedor->telefonos as $telefono)
                    <tr>
                        <td>{!! $telefono->tipoTelefono->nombre !!}</td>
                        <td>{!! $telefono->codigo_area !!}</td>
                        <td>{!! $telefono->num_telf !!}</td>
                        <td class="text-center">@if ($telefono->es_principal) S @else N @endif</td>
                        <td>{!! $telefono->notas !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="font-blue-hoki"><i class="fa fa-globe"></i>  <b>Contactos Web:</b></h4>
        <div class="flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                <tr>
                    <th width="15%"> Tipo </th>
                    <th width="30%"> Descripción </th>
                    <th width="10%" class="text-center"> Principal </th>
                    <th width="45%"> Notas </th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedor->contactosWeb as $web)
                    <tr>
                        <td>{!! $web->tipoContactoWeb->nombre !!}</td>
                        <td>{!! $web->valor !!}</td>
                        <td class="text-center">@if ($web->es_principal) S @else N @endif</td>
                        <td>{!! $web->notas !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

{{--
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->created_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->created_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('created_ip', 'Created Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->created_ip !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->updated_by !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->updated_at !!}</span>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('updated_ip', 'Updated Ip:', ['class' => 'control-label']) !!}
    <span class="form-control">{!! $proveedor->updated_ip !!}</span>
</div>
--}}


