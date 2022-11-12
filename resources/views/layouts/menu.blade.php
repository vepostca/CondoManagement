

<li class="nav-item start {!! Request::is('home*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title"><b>INICIO</b></span>
    </a>
</li>
<li class="nav-item">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-wrench"></i>
        <span class="title"><b>SISTEMA</b></span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="{!! route('com.clientes.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Compañía</b></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-toggle">
                <i class="fa fa-angle-double-right"></i> <b>Seguridad</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{!! route('seg.rols.index') !!}" class="nav-link">
                        <i class="fa fa-angle-right"></i> <b>Roles</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('seg.permisos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-right"></i> <b>Permisos</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{!! route('com.pais.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>País</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.regions.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Región</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.monedas.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Moneda</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.tipoDireccions.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Tipos de Dirección</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.tipoTelefonos.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Tipos de Contacto Telefónico</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.tipoContactoWebs.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Tipos de Contacto Web</b></a>
        </li>
        <li class="nav-item">
            <a href="{!! route('com.estatusTareas.index') !!}" class="nav-link">
                <i class="fa fa-angle-double-right"></i> <b>Estatus Actividades</b></a>
        </li>
    </ul>
</li>
<li class="nav-item {!! Request::is('test*') ? 'active' : '' !!}">
    <a href="{!! url('/admin') !!}" class="nav-link nav-toggle">
        <i class="fa fa-calculator"></i>
        <span class="title"><b>ADMINISTRACIÓN</b></span>
        <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i> <b>CONFIGURACIÓN GENERAL</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{!! route('com.orgs.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Datos del Condominio</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.divisions.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Divisiones</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.tipoInmuebles.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Tipos de Inmueble</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.tipoPropietarios.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Tipos de Propietario</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.inmuebles.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Inmuebles</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.propietarios.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Propietarios</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.propietarioInmuebles.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Asignación de Inmuebles y Propietarios</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.estacionamientos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Estacionamientos</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.tipoCalculoCuotas.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Tipos de Cálculo de Cuotas</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-toggle-up"></i> <b>INGRESOS</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Individual</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Masivo</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Extraordinario</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Ingresos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Anticipos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Emisión de Recibos de Pago</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Histórico Recibos de Pago</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-file-text-o"></i> <b>CUOTAS</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Generar Cuotas</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Recibos de Cobro</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Recargos de Mora</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.descuentos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Configuración de Descuentos</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.recargos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Configuración de Recargos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Reportes</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-toggle-down"></i> <b>EGRESOS</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Nuevo Egreso</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Egresos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Reportes</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-bank"></i> <b>BANCOS Y CUENTAS</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{!! route('com.cuentaBancos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Cuentas</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Transferencias</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Reportes</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.entidadBancarias.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Bancos</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.tipoCuentaBancos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Tipos de Cuenta</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.formaPagos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Formas de Pago</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-th-large"></i> <b>PRESUPUESTOS</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Presupuestos</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.conceptos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Conceptos</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('com.categoriaConceptos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Categoría Conceptos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Reportes</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-odnoklassniki"></i> <b>PROVEEDORES</b>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{!! route('pro.proveedors.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Control de Proveedores</b></a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('pro.actividadProveedors.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Actividad Proveedor</b></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-money"></i> <b>FONDOS</b>
                <span class="arrow nav-toggle"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{!! route('com.fondos.index') !!}" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Gestión de Fondos</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-angle-double-right"></i> <b>Reportes</b></a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item {!! Request::is('abc*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="fa fa-newspaper-o"></i>
        <span class="title"><b>COMUNICACIONES</b></span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-envelope-o"></i> <b>MENSAJES</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-bell-o"></i> <b>ANUNCIOS</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-calendar"></i> <b>EVENTOS</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-flag-o"></i> <b>INCIDENCIAS</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-tasks"></i> <b>ACTIVIDADES</b>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {!! Request::is('dsdhj*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="fa fa-list"></i>
        <span class="title"><b>RESÚMEN FINANCIERO</b></span>
    </a>
</li>

<li class="nav-item {!! Request::is('dssde*') ? 'active' : '' !!}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-building-o"></i>
        <span class="title"><b>INSTALACIONES</b></span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="{!! route('com.instalacions.index') !!}" class="nav-link nav-toggle">
                <i class="fa fa-building"></i> <b>Instalación</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-ticket"></i> <b>Reservar</b>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-ticket"></i> <b>Mis Reservas</b>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {!! Request::is('hoaas*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="fa fa-book"></i>
        <span class="title"><b>GESTIÓN DOCUMENTAL</b></span>
    </a>
</li>