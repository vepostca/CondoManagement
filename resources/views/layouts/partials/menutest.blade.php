<h1 class="page-title">Administración.
    <small>Menú de Opciones.</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url('/home') }}">Inicio</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span><i class="fa fa-calculator"></i> Administración</span>
        </li>
    </ul>
</div>


<div class="col-xs-12 col-md-4">
    <div class="panel-group accordion" id="accordion1">
        <div class="panel bg-blue-chambray">
            <div class="panel-heading dashboard-stat blue-chambray" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-wrench fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Sistema</div>
                    <div class="desc">Estructura de la Aplicación</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_1" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                        <a href="{!! route('com.clientes.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Compañía</a><br>
                            <a href="javascript:;" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Seguridad</a><br>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{!! route('seg.rols.index') !!}" class="font-blue-chambray">
                                <i class="fa fa-angle-right"></i> Roles</a><br>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{!! route('seg.permisos.index') !!}" class="font-blue-chambray">
                                <i class="fa fa-angle-right"></i> Permisos</a><br>
                        <a href="{!! route('com.pais.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> País</a><br>
                        <a href="{!! route('com.regions.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Región</a><br>
                        <a href="{!! route('com.monedas.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Moneda</a><br>
                        <a href="{!! route('com.tipoDireccions.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Tipos de Dirección</a><br>
                        <a href="{!! route('com.tipoTelefonos.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Tipos de Contacto Telefónico</a><br>
                        <a href="{!! route('com.tipoContactoWebs.index') !!}" class="font-blue-chambray">
                            <i class="fa fa-angle-double-right"></i> Tipos de Contacto Web</a><br>
                        <a href="{!! route('com.estatusTareas.index') !!}" class="font-blue-chambray">
                        <i class="fa fa-angle-double-right"></i> Estatus Actividades</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-yellow-casablanca">
            <div class="panel-heading dashboard-stat yellow-casablanca" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-gear fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Configuración General</div>
                    <div class="desc">Parámetros del Sistema</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_2" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('com.orgs.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Datos del Condominio</a><br>
                    <a href="{!! route('com.divisions.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Divisiones</a><br>
                    <a href="{!! route('com.tipoInmuebles.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Tipos de Inmueble</a><br>
                    <a href="{!! route('com.tipoPropietarios.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Tipos de Propietario</a><br>
                    <a href="{!! route('com.inmuebles.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Inmuebles</a><br>
                    <a href="{!! route('com.propietarios.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Propietarios</a><br>
                    <a href="{!! route('com.propietarioInmuebles.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Asignación de Inmuebles y Propietarios</a><br>
                    <a href="{!! route('com.estacionamientos.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Estacionamientos</a><br>
                    <a href="{!! route('com.instalacions.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Instalaciones</a><br>
                    <a href="{!! route('com.tipoCalculoCuotas.index') !!}" class="font-yellow-casablanca">
                        <i class="fa fa-angle-double-right"></i> Tipos Cálculo de Cuotas</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-blue">
            <div class="panel-heading dashboard-stat blue" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-toggle-up fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Ingresos</div>
                    <div class="desc">Gestión de Ingresos</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_3" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Individual</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Masivo</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Extraordinario</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Gestión de Ingresos</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Gestión de Anticipos</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Emisión de Recibos de Pago</a><br>
                    <a href="#" class="font-blue">
                        <i class="fa fa-angle-double-right"></i> Histórico Recibos de Pago</a><br>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-xs-12 col-md-4">
    <div class="panel-group accordion" id="accordion2">
        <div class="panel bg-green-jungle">
            <div class="panel-heading dashboard-stat green-jungle" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-file-text-o fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Cuotas</div>
                    <div class="desc">Cuotas de Condominio</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_1">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_2_1" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('com.recargos.index') !!}" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Configuración de Recargos</a><br>
                    <a href="{!! route('com.descuentos.index') !!}" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Configuración de Descuentos</a><br>
                    <a href="#" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Generar Cuotas</a><br>
                    <a href="#" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Recibos de Cobro</a><br>
                    <a href="#" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Aplicar Recargos de Mora</a><br>
                    <a href="#" class="font-green-jungle">
                        <i class="fa fa-angle-double-right"></i> Reportes</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-red-thunderbird">
            <div class="panel-heading dashboard-stat red-thunderbird" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-toggle-down fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Egresos</div>
                    <div class="desc">Gestión de Gastos y/o Pagos</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_2_2" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="#" class="font-red-thunderbird">
                        <i class="fa fa-angle-double-right"></i> Nuevo Egreso</a><br>
                    <a href="#" class="font-red-thunderbird">
                        <i class="fa fa-angle-double-right"></i> Gestión de Egresos</a><br>
                    <a href="#" class="font-red-thunderbird">
                        <i class="fa fa-angle-double-right"></i> Reportes</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-purple-studio">
            <div class="panel-heading dashboard-stat purple-studio" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-bank fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Bancos y Cuentas</div>
                    <div class="desc">Gestión de Ctas. Bancarias</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_3">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_2_3" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('com.cuentaBancos.index') !!}" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Gestión de Cuentas</a><br>
                    <a href="#" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Transferencia entre Cuentas</a><br>
                    <a href="#" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Reportes</a><br>
                    <a href="{!! route('com.entidadBancarias.index') !!}" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Bancos</a><br>
                    <a href="{!! route('com.tipoCuentaBancos.index') !!}" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Tipos de Cuenta</a><br>
                    <a href="{!! route('com.formaPagos.index') !!}" class="font-purple-studio">
                        <i class="fa fa-angle-double-right"></i> Formas de Pago</a><br>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-xs-12 col-md-4" >
    <div class="panel-group accordion" id="accordion3">
        <div class="panel bg-yellow-gold">
            <div class="panel-heading dashboard-stat yellow-gold" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-th-large fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Presupuestos</div>
                    <div class="desc">Planificación Presupuestaria</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_3_1" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('com.conceptos.index') !!}" class="font-yellow-gold">
                        <i class="fa fa-angle-double-right"></i> Conceptos</a><br>
                    <a href="{!! route('com.categoriaConceptos.index') !!}" class="font-yellow-gold">
                        <i class="fa fa-angle-double-right"></i> Categorías Conceptos</a><br>
                    <a href="#" class="font-yellow-gold">
                        <i class="fa fa-angle-double-right"></i> Gestión de Presupuestos</a><br>
                    <a href="#" class="font-yellow-gold">
                        <i class="fa fa-angle-double-right"></i> Reportes</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-green">
            <div class="panel-heading dashboard-stat green" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-odnoklassniki fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Proveedores</div>
                    <div class="desc">Gestión de Proveedores</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_3_2" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('pro.proveedors.index') !!}" class="font-green">
                        <i class="fa fa-angle-double-right"></i> Control de Proveedores</a><br>
                    <a href="{!! route('pro.actividadProveedors.index') !!}" class="font-green">
                        <i class="fa fa-angle-double-right"></i> Actividad Proveedor</a><br>
                </div>
            </div>
        </div>
        <div class="panel bg-grey-mint">
            <div class="panel-heading dashboard-stat grey-mint" style="margin-bottom: 0px;">
                <div class="visual">
                    <i class="fa fa-money fa-icon-medium" style="margin-left: 0px;"></i>
                </div>
                <div class="details">
                    <div class="number">Fondos</div>
                    <div class="desc">Gestion de Fondos de Reserva</div>
                </div>
                <a class="more accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">Ver más
                    <i class="m-icon-swapdown m-icon-white"></i>
                </a>
            </div>
            <div id="collapse_3_3" class="panel-collapse collapse">
                <div class="panel-body bg-white">
                    <a href="{!! route('com.fondos.index') !!}" class="font-grey-mint">
                        <i class="fa fa-angle-double-right"></i> Gestión de Fondos</a><br>
                    <a href="#" class="font-grey-mint">
                        <i class="fa fa-angle-double-right"></i> Reportes</a><br>
                </div>
            </div>
        </div>

    </div>
</div>

