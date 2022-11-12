<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('com_org_id', 'Compañía:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->cliente->nombre !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->codigo !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->nombre !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->id_legal !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->descripcion !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_alta', 'Fecha Ingreso:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->fecha_alta !!}</span>
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_baja', 'Fecha Egreso:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $org->fecha_baja !!}</span>
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
        <label class="checkbox-inline" style="padding-left:0px">
            {!! Form::checkbox('activo', $org->activo , $org->activo, ['data-toggle' => 'toggle',
                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                     'data-size' => 'normal',
                                                     'data-height' => '28',
                                                     'data-width' => '50', 'disabled' => 'disabled']) !!}
        </label>
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
                @foreach($org->direcciones as $direccion)
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
                @foreach($org->telefonos as $telefono)
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
                @foreach($org->contactosWeb as $web)
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


<div class="panel border-blue-hoki">
    <div class="panel-heading bg-blue-hoki font-white">
        <h3 class="panel-title"><b>Parámetros Condominio</b></h3>
    </div>
    <div class="panel-body">
        <div class="form-group col-sm-6">
            {!! Form::label('moneda', 'Moneda:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $parametros->moneda->nombre . ' (' .
                                        $parametros->moneda->codigo_iso . ' - ' .
                                         $parametros->moneda->simbolo . ')' !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('separador_decimal', 'Separador Decimal:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $parametros->separador_decimal !!}</span>
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('num_dec_coeficiente', 'Cant. Decimales del Coeficiente:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $parametros->num_dec_coeficiente !!}</span>
        </div>


        <div class="form-group col-sm-6">
            {!! Form::label('com_tipo_calculo_cuota', 'Tipo Cálculo Cuotas:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $parametros->tipoCalculoCuota->nombre !!}</span>
        </div>
    </div>
</div>

<div class="panel border-blue-hoki">
    <div class="panel-heading bg-blue-hoki font-white">
        <h3 class="panel-title"><b>Parámetros Servidor de Correo Electrónico</b></h3>
    </div>
    <div class="panel-body">
        <div class="form-group col-sm-2">
            {!! Form::label('servidor_smtp', 'Servidor Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->servidor_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('autorizacion_smtp', 'Autorización Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->autorizacion_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('cuenta_smtp', 'Cuenta Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->cuenta_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('enviador_smtp', 'Enviador Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->enviador_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('seguridad_smtp', 'Seguridad Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->seguridad_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('puerto_smtp', 'Puerto Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $org->puerto_smtp !!}</span>
        </div>
    </div>
</div>

{{--<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{!! $org->created_by !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $org->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_ip', 'Created Ip:') !!}
    <p>{!! $org->created_ip !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{!! $org->updated_by !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $org->updated_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_ip', 'Updated Ip:') !!}
    <p>{!! $org->updated_ip !!}</p>
</div>--}}

