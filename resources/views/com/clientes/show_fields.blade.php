<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->id !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('com_org_id', 'Condominio:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->org->nombre !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('codigo', 'Código:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->codigo !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->nombre !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('id_legal', 'RIF:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->id_legal !!}</span>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripción:', ['class' => 'control-label']) !!}
        <span class="form-control">{!! $cliente->descripcion !!}</span>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12 required">
        {!! Form::label('activo', 'Activo:',['class' => 'control-label']) !!}<br>
        <label class="checkbox-inline" style="padding-left:0px">
            {!! Form::checkbox('activo', $cliente->activo , $cliente->activo, ['data-toggle' => 'toggle',
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
                @foreach($cliente->direcciones as $direccion)
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
                @foreach($cliente->telefonos as $telefono)
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
                @foreach($cliente->contactosWeb as $web)
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
        <h3 class="panel-title"><b>Parámetros Servidor de Correo Electrónico</b></h3>
    </div>
    <div class="panel-body">
        <div class="form-group col-sm-2">
            {!! Form::label('servidor_smtp', 'Servidor Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->servidor_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('autorizacion_smtp', 'Autorización Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->autorizacion_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('cuenta_smtp', 'Cuenta Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->cuenta_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('enviador_smtp', 'Enviador Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->enviador_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('seguridad_smtp', 'Seguridad Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->seguridad_smtp !!}</span>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('puerto_smtp', 'Puerto Smtp:', ['class' => 'control-label']) !!}
            <span class="form-control">{!! $cliente->puerto_smtp !!}</span>
        </div>
    </div>
</div>
{{--

<!-- Servidor Smtp Field -->
<div class="form-group">
    {!! Form::label('servidor_smtp', 'Servidor Smtp:') !!}
    <p>{!! $cliente->servidor_smtp !!}</p>
</div>

<!-- Autorizacion Smtp Field -->
<div class="form-group">
    {!! Form::label('autorizacion_smtp', 'Autorizacion Smtp:') !!}
    <p>{!! $cliente->autorizacion_smtp !!}</p>
</div>

<!-- Cuenta Smtp Field -->
<div class="form-group">
    {!! Form::label('cuenta_smtp', 'Cuenta Smtp:') !!}
    <p>{!! $cliente->cuenta_smtp !!}</p>
</div>

<!-- Pwd Smtp Field -->
<div class="form-group">
    {!! Form::label('pwd_smtp', 'Pwd Smtp:') !!}
    <p>{!! $cliente->pwd_smtp !!}</p>
</div>

<!-- Enviador Smtp Field -->
<div class="form-group">
    {!! Form::label('enviador_smtp', 'Enviador Smtp:') !!}
    <p>{!! $cliente->enviador_smtp !!}</p>
</div>

<!-- Seguridad Smtp Field -->
<div class="form-group">
    {!! Form::label('seguridad_smtp', 'Seguridad Smtp:') !!}
    <p>{!! $cliente->seguridad_smtp !!}</p>
</div>

<!-- Puerto Smtp Field -->
<div class="form-group">
    {!! Form::label('puerto_smtp', 'Puerto Smtp:') !!}
    <p>{!! $cliente->puerto_smtp !!}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{!! $cliente->created_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cliente->created_at !!}</p>
</div>

<!-- Created Ip Field -->
<div class="form-group">
    {!! Form::label('created_ip', 'Created Ip:') !!}
    <p>{!! $cliente->created_ip !!}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{!! $cliente->updated_by !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cliente->updated_at !!}</p>
</div>

<!-- Updated Ip Field -->
<div class="form-group">
    {!! Form::label('updated_ip', 'Updated Ip:') !!}
    <p>{!! $cliente->updated_ip !!}</p>
</div>

--}}
