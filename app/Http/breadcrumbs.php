<?php

// Home o Inicio
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Inicio', route('home'), ['icon' => 'fa fa-home']);
});

// Admin
Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Administración', route('admin'), ['icon' => 'fa fa-calculator']);
});

// Sistema
Breadcrumbs::register('sistema', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sistema', url('/admin#collapse_1'), ['icon' => 'fa fa-wrench']);
});

// Configuracion General
Breadcrumbs::register('config-general', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Configuración General', url('/admin#collapse_2'), ['icon' => 'fa fa-gear']);
});

// Modulo Cuotas
Breadcrumbs::register('modulo-cuotas', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Cuotas', url('/admin#collapse_2_1'), ['icon' => 'fa fa-file-text-o']);
});

// Bancos y Cuentas
Breadcrumbs::register('bancos-cuentas', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Bancos y Cuentas', url('/admin#collapse_2_3'), ['icon' => 'fa fa-bank']);
});

// Proveedores
Breadcrumbs::register('proveedores', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Gestión de Proveedores', url('/admin#collapse_3_2'), ['icon' => 'fa fa-odnoklassniki']);
});

// Fondos
Breadcrumbs::register('gestion-fondos', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Gestión de Fondos', url('/admin#collapse_3_3'), ['icon' => 'fa fa-money']);
});

// Sub Modulo Presupuestos
Breadcrumbs::register('presupuesto-modulo', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Presupuestos', url('/admin#collapse_3_1'), ['icon' => 'fa fa-th-large']);
});


// Clientes
Breadcrumbs::register('clientes', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Compañía', route('com.clientes.index'),['icon' => 'fa fa-thumb-tack']);
});
// Clientes Create
Breadcrumbs::register('clientesCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Nuevo Registro', route('com.clientes.create'));
});
// Clientes Edit
Breadcrumbs::register('clientesEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Editar Registro');
});
// Clientes Show
Breadcrumbs::register('clientesShow', function($breadcrumbs)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Mostrar Registro');
});

// Cliente Info
Breadcrumbs::register('clienteInfos', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Parámetros Condominio', route('com.clienteInfos.show', $id),['icon' => 'fa fa-thumb-tack']);
});
// clienteInfo Create
Breadcrumbs::register('clienteInfosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Nuevos Parámetros', route('com.clienteInfos.create'));
});
// clienteInfo Edit
Breadcrumbs::register('clienteInfosEdit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push('Editar Registro', route('com.clienteInfos.edit', $id));
});
// clienteInfo Show
Breadcrumbs::register('clienteInfosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('clienteInfos');
    $breadcrumbs->push('Mostrar Registro');
});




// Org
Breadcrumbs::register('orgs', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Condominio', route('com.orgs.index'),['icon' => 'fa fa-thumb-tack']);
});
// Org Create
Breadcrumbs::register('orgsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Nuevo Registro', route('com.orgs.create'));
});
// orgs Edit
Breadcrumbs::register('orgsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Editar Registro');
});
// orgs Show
Breadcrumbs::register('orgsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Mostrar Registro');
});

// Org Info
Breadcrumbs::register('orgInfos', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Parámetros Condominio', route('com.orgInfos.show', $id),['icon' => 'fa fa-thumb-tack']);
});
// OrgInfo Create
Breadcrumbs::register('orgInfosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Nuevo Parámetros', route('com.orgInfos.create'));
});
// orgInfo Edit
Breadcrumbs::register('orgInfosEdit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('orgs');
    $breadcrumbs->push('Editar Registro', route('com.orgInfos.edit', $id));
});
// orgInfo Show
Breadcrumbs::register('orgInfosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('orgInfos');
    $breadcrumbs->push('Mostrar Registro');
});


// Tipo Contacto Telefonico
Breadcrumbs::register('tipoTelefonos', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Tipo Contacto Telefónico', route('com.tipoTelefonos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Contacto Telefonico Create
Breadcrumbs::register('tipoTelefonosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoTelefonos');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoTelefonos.create'));
});
// Tipo Contacto Telefonico Edit
Breadcrumbs::register('tipoTelefonosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoTelefonos');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Contacto Telefonico Show
Breadcrumbs::register('tipoTelefonosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoTelefonos');
    $breadcrumbs->push('Mostrar Registro');
});


// Tipo Propietarios
Breadcrumbs::register('tipoPropietarios', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Tipos de Propietarios', route('com.tipoPropietarios.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Propietarios Create
Breadcrumbs::register('tipoPropietariosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoPropietarios');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoPropietarios.create'));
});
// Tipo Propietarios Edit
Breadcrumbs::register('tipoPropietariosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoPropietarios');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Propietarios Show
Breadcrumbs::register('tipoPropietariosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoPropietarios');
    $breadcrumbs->push('Mostrar Registro');
});

// Tipo Inmuebles
Breadcrumbs::register('tipoInmuebles', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Tipos de Inmuebles', route('com.tipoInmuebles.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Inmuebles Create
Breadcrumbs::register('tipoInmueblesCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoInmuebles');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoInmuebles.create'));
});
// Tipo Inmuebles Edit
Breadcrumbs::register('tipoInmueblesEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoInmuebles');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Propietarios Show
Breadcrumbs::register('tipoInmueblesShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoInmuebles');
    $breadcrumbs->push('Mostrar Registro');
});

// Tipo Direccion
Breadcrumbs::register('tipoDireccions', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Tipos de Dirección', route('com.tipoDireccions.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Direccion Create
Breadcrumbs::register('tipoDireccionsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoDireccions');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoDireccions.create'));
});
// Tipo Direccion Edit
Breadcrumbs::register('tipoDireccionsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoDireccions');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Direccion Show
Breadcrumbs::register('tipoDireccionsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoDireccions');
    $breadcrumbs->push('Mostrar Registro');
});

// Tipo Contacto Web
Breadcrumbs::register('tipoContactoWebs', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Tipos de Contacto Web', route('com.tipoContactoWebs.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Contacto Web Create
Breadcrumbs::register('tipoContactoWebsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoContactoWebs');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoDireccions.create'));
});
// Tipo Contacto Web Edit
Breadcrumbs::register('tipoContactoWebsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoContactoWebs');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Contacto Web Show
Breadcrumbs::register('tipoContactoWebsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoContactoWebs');
    $breadcrumbs->push('Mostrar Registro');
});


// Estatus Actividades
Breadcrumbs::register('estatusTareas', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Estatus Actividades', route('com.estatusTareas.index'),['icon' => 'fa fa-thumb-tack']);
});
// Estatus Actividades Create
Breadcrumbs::register('estatusTareasCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('estatusTareas');
    $breadcrumbs->push('Nuevo Registro', route('com.estatusTareas.create'));
});
// Estatus Actividades Edit
Breadcrumbs::register('estatusTareasEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('estatusTareas');
    $breadcrumbs->push('Editar Registro');
});
// Estatus Actividades Show
Breadcrumbs::register('estatusTareasShow', function($breadcrumbs)
{
    $breadcrumbs->parent('estatusTareas');
    $breadcrumbs->push('Mostrar Registro');
});

// Tipo Calculo Cuota
Breadcrumbs::register('tipoCalculoCuotas', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Tipos de Cálculo de Cuotas', route('com.tipoCalculoCuotas.index'),['icon' => 'fa fa-thumb-tack']);
});
// Tipo Calculo Cuota Create
Breadcrumbs::register('tipoCalculoCuotasCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCalculoCuotas');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoCalculoCuotas.create'));
});
// Tipo Calculo Cuota Edit
Breadcrumbs::register('tipoCalculoCuotasEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCalculoCuotas');
    $breadcrumbs->push('Editar Registro');
});
// Tipo Calculo Cuota Show
Breadcrumbs::register('tipoCalculoCuotasShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCalculoCuotas');
    $breadcrumbs->push('Mostrar Registro');
});


// Regiones
Breadcrumbs::register('regions', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Región', route('com.regions.index'),['icon' => 'fa fa-thumb-tack']);
});
// Region Create
Breadcrumbs::register('regionsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('regions');
    $breadcrumbs->push('Nuevo Registro', route('com.regions.create'));
});
// Region Edit
Breadcrumbs::register('regionsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('regions');
    $breadcrumbs->push('Editar Registro');
});
// Region Show
Breadcrumbs::register('regionsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('regions');
    $breadcrumbs->push('Mostrar Registro');
});


// Paises
Breadcrumbs::register('pais', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('País', route('com.pais.index'),['icon' => 'fa fa-thumb-tack']);
});
// Pais Create
Breadcrumbs::register('paisCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('pais');
    $breadcrumbs->push('Nuevo Registro', route('com.pais.create'));
});
// Pais Edit
Breadcrumbs::register('paisEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('pais');
    $breadcrumbs->push('Editar Registro');
});
// Pais Show
Breadcrumbs::register('paisShow', function($breadcrumbs)
{
    $breadcrumbs->parent('pais');
    $breadcrumbs->push('Mostrar Registro');
});


// Monedas
Breadcrumbs::register('monedas', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Moneda', route('com.monedas.index'),['icon' => 'fa fa-thumb-tack']);
});
// Moneda Create
Breadcrumbs::register('monedasCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('monedas');
    $breadcrumbs->push('Nuevo Registro', route('com.monedas.create'));
});
// Moneda Edit
Breadcrumbs::register('monedasEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('monedas');
    $breadcrumbs->push('Editar Registro');
});
// Moneda Show
Breadcrumbs::register('monedasShow', function($breadcrumbs)
{
    $breadcrumbs->parent('monedas');
    $breadcrumbs->push('Mostrar Registro');
});


// Inmuebles
Breadcrumbs::register('inmuebles', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Inmuebles', route('com.inmuebles.index'),['icon' => 'fa fa-thumb-tack']);
});
// Inmueble Create
Breadcrumbs::register('inmueblesCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('inmuebles');
    $breadcrumbs->push('Nuevo Registro', route('com.inmuebles.create'));
});
// Inmueble Edit
Breadcrumbs::register('inmueblesEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('inmuebles');
    $breadcrumbs->push('Editar Registro');
});
// Inmueble Show
Breadcrumbs::register('inmueblesShow', function($breadcrumbs)
{
    $breadcrumbs->parent('inmuebles');
    $breadcrumbs->push('Mostrar Registro');
});


// Divisiones
Breadcrumbs::register('divisions', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Divisiones', route('com.divisions.index'),['icon' => 'fa fa-thumb-tack']);
});
// Divisions Create
Breadcrumbs::register('divisionsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('divisions');
    $breadcrumbs->push('Nuevo Registro', route('com.divisions.create'));
});
// Divisions Edit
Breadcrumbs::register('divisionsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('divisions');
    $breadcrumbs->push('Editar Registro');
});
// Divisions Show
Breadcrumbs::register('divisionsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('divisions');
    $breadcrumbs->push('Mostrar Registro');
});


// Formas de Pago
Breadcrumbs::register('formaPagos', function($breadcrumbs)
{
    $breadcrumbs->parent('bancos-cuentas');
    $breadcrumbs->push('Formas de Pago', route('com.formaPagos.index'),['icon' => 'fa fa-thumb-tack']);
});
// formaPagos Create
Breadcrumbs::register('formaPagosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('formaPagos');
    $breadcrumbs->push('Nuevo Registro', route('com.formaPagos.create'));
});
// formaPagos Edit
Breadcrumbs::register('formaPagosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('formaPagos');
    $breadcrumbs->push('Editar Registro');
});
// formaPagos Show
Breadcrumbs::register('formaPagosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('formaPagos');
    $breadcrumbs->push('Mostrar Registro');
});

// Tipos de Cuenta Bancaria
Breadcrumbs::register('tipoCuentaBancos', function($breadcrumbs)
{
    $breadcrumbs->parent('bancos-cuentas');
    $breadcrumbs->push('Tipo de Cuenta', route('com.tipoCuentaBancos.index'),['icon' => 'fa fa-thumb-tack']);
});
// formaPagos Create
Breadcrumbs::register('tipoCuentaBancosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCuentaBancos');
    $breadcrumbs->push('Nuevo Registro', route('com.tipoCuentaBancos.create'));
});
// formaPagos Edit
Breadcrumbs::register('tipoCuentaBancosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCuentaBancos');
    $breadcrumbs->push('Editar Registro');
});
// formaPagos Show
Breadcrumbs::register('tipoCuentaBancosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('tipoCuentaBancos');
    $breadcrumbs->push('Mostrar Registro');
});


// Actividad Proveedor
Breadcrumbs::register('actividadProveedors', function($breadcrumbs)
{
    $breadcrumbs->parent('proveedores');
    $breadcrumbs->push('Actividad Proveedor', route('pro.actividadProveedors.index'),['icon' => 'fa fa-thumb-tack']);
});
// Actividad Proveedor Create
Breadcrumbs::register('actividadProveedorsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('actividadProveedors');
    $breadcrumbs->push('Nuevo Registro', route('pro.actividadProveedors.create'));
});
// Actividad Proveedor Edit
Breadcrumbs::register('actividadProveedorsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('actividadProveedors');
    $breadcrumbs->push('Editar Registro');
});
// Actividad Proveedor Show
Breadcrumbs::register('actividadProveedorsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('actividadProveedors');
    $breadcrumbs->push('Mostrar Registro');
});

// Proveedor
Breadcrumbs::register('proveedors', function($breadcrumbs)
{
    $breadcrumbs->parent('proveedores');
    $breadcrumbs->push('Control de Proveedores', route('pro.proveedors.index'),['icon' => 'fa fa-thumb-tack']);
});
// Proveedor Create
Breadcrumbs::register('proveedorsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('proveedors');
    $breadcrumbs->push('Nuevo Registro', route('pro.proveedors.create'));
});
// Proveedor Edit
Breadcrumbs::register('proveedorsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('proveedors');
    $breadcrumbs->push('Editar Registro');
});
// Proveedor Show
Breadcrumbs::register('proveedorsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('proveedors');
    $breadcrumbs->push('Mostrar Registro');
});



// Fondos
Breadcrumbs::register('fondos', function($breadcrumbs)
{
    $breadcrumbs->parent('gestion-fondos');
    $breadcrumbs->push('Fondos', route('com.fondos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Fondos Create
Breadcrumbs::register('fondosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('fondos');
    $breadcrumbs->push('Nuevo Registro', route('com.fondos.create'));
});
// Fondos Edit
Breadcrumbs::register('fondosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('fondos');
    $breadcrumbs->push('Editar Registro');
});
// Fondos Show
Breadcrumbs::register('fondosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('fondos');
    $breadcrumbs->push('Mostrar Registro');
});

// Categoria Conceptos
Breadcrumbs::register('categoriaConceptos', function($breadcrumbs)
{
    $breadcrumbs->parent('presupuesto-modulo');
    $breadcrumbs->push('Categorías Conceptos', route('com.categoriaConceptos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Categoria Conceptos Create
Breadcrumbs::register('categoriaConceptosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('categoriaConceptos');
    $breadcrumbs->push('Nuevo Registro', route('com.categoriaConceptos.create'));
});
// Categoria Conceptos Edit
Breadcrumbs::register('categoriaConceptosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('categoriaConceptos');
    $breadcrumbs->push('Editar Registro');
});
// Categoria Conceptos Show
Breadcrumbs::register('categoriaConceptosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('categoriaConceptos');
    $breadcrumbs->push('Mostrar Registro');
});


// Conceptos
Breadcrumbs::register('conceptos', function($breadcrumbs)
{
    $breadcrumbs->parent('presupuesto-modulo');
    $breadcrumbs->push('Conceptos', route('com.conceptos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Conceptos Create
Breadcrumbs::register('conceptosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('conceptos');
    $breadcrumbs->push('Nuevo Registro', route('com.conceptos.create'));
});
// Conceptos Edit
Breadcrumbs::register('conceptosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('conceptos');
    $breadcrumbs->push('Editar Registro');
});
// Conceptos Show
Breadcrumbs::register('conceptosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('conceptos');
    $breadcrumbs->push('Mostrar Registro');
});


// Instalación
Breadcrumbs::register('instalacions', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Instalación', route('com.instalacions.index'),['icon' => 'fa fa-thumb-tack']);
});
// Instalación Create
Breadcrumbs::register('instalacionsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('instalacions');
    $breadcrumbs->push('Nuevo Registro', route('com.instalacions.create'));
});
// Instalación Edit
Breadcrumbs::register('instalacionsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('instalacions');
    $breadcrumbs->push('Editar Registro');
});
// Instalación Show
Breadcrumbs::register('instalacionsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('instalacions');
    $breadcrumbs->push('Mostrar Registro');
});


// Estacionamiento
Breadcrumbs::register('estacionamientos', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Estacionamiento', route('com.estacionamientos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Estacionamiento Create
Breadcrumbs::register('estacionamientosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('estacionamientos');
    $breadcrumbs->push('Nuevo Registro', route('com.estacionamientos.create'));
});
// Estacionamiento Edit
Breadcrumbs::register('estacionamientosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('estacionamientos');
    $breadcrumbs->push('Editar Registro');
});
// Estacionamiento Show
Breadcrumbs::register('estacionamientosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('estacionamientos');
    $breadcrumbs->push('Mostrar Registro');
});


// Configuracion de Recargos
Breadcrumbs::register('recargos', function($breadcrumbs)
{
    $breadcrumbs->parent('modulo-cuotas');
    $breadcrumbs->push('Recargos', route('com.recargos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Recargos Create
Breadcrumbs::register('recargosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('recargos');
    $breadcrumbs->push('Nuevo Registro', route('com.recargos.create'));
});
// Recargos Edit
Breadcrumbs::register('recargosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('recargos');
    $breadcrumbs->push('Editar Registro');
});
// Recargos Show
Breadcrumbs::register('recargosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('recargos');
    $breadcrumbs->push('Mostrar Registro');
});

// Configuracion de Descuentos
Breadcrumbs::register('descuentos', function($breadcrumbs)
{
    $breadcrumbs->parent('modulo-cuotas');
    $breadcrumbs->push('Descuentos', route('com.descuentos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Descuentos Create
Breadcrumbs::register('descuentosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('descuentos');
    $breadcrumbs->push('Nuevo Registro', route('com.descuentos.create'));
});
// Descuentos Edit
Breadcrumbs::register('descuentosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('descuentos');
    $breadcrumbs->push('Editar Registro');
});
// Descuentos Show
Breadcrumbs::register('descuentosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('descuentos');
    $breadcrumbs->push('Mostrar Registro');
});


// Propietarios
Breadcrumbs::register('propietarios', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Propietarios', route('com.propietarios.index'),['icon' => 'fa fa-thumb-tack']);
});
// Propietarios Create
Breadcrumbs::register('propietariosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarios');
    $breadcrumbs->push('Nuevo Registro', route('com.propietarios.create'));
});
// Propietarios Edit
Breadcrumbs::register('propietariosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarios');
    $breadcrumbs->push('Editar Registro');
});
// Propietarios Show
Breadcrumbs::register('propietariosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarios');
    $breadcrumbs->push('Mostrar Registro');
});


// Propietario Inmueble
Breadcrumbs::register('propietarioInmuebles', function($breadcrumbs)
{
    $breadcrumbs->parent('config-general');
    $breadcrumbs->push('Asignación de Propietarios e Inmuebles', route('com.propietarioInmuebles.index'),['icon' => 'fa fa-thumb-tack']);
});
// Propietario Inmueble Create
Breadcrumbs::register('propietarioInmueblesCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarioInmuebles');
    $breadcrumbs->push('Nuevo Registro', route('com.propietarioInmuebles.create'));
});
// Propietario Inmueble Edit
Breadcrumbs::register('propietarioInmueblesEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarioInmuebles');
    $breadcrumbs->push('Editar Registro');
});
// Propietario Inmueble Show
Breadcrumbs::register('propietarioInmueblesShow', function($breadcrumbs)
{
    $breadcrumbs->parent('propietarioInmuebles');
    $breadcrumbs->push('Mostrar Registro');
});


// EntidadBancaria
Breadcrumbs::register('entidadBancarias', function($breadcrumbs)
{
    $breadcrumbs->parent('bancos-cuentas');
    $breadcrumbs->push('Bancos', route('com.entidadBancarias.index'),['icon' => 'fa fa-thumb-tack']);
});
// EntidadBancaria Create
Breadcrumbs::register('entidadBancariasCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('entidadBancarias');
    $breadcrumbs->push('Nuevo Registro', route('com.entidadBancarias.create'));
});
// EntidadBancaria Edit
Breadcrumbs::register('entidadBancariasEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('entidadBancarias');
    $breadcrumbs->push('Editar Registro');
});
// EntidadBancaria Show
Breadcrumbs::register('entidadBancariasShow', function($breadcrumbs)
{
    $breadcrumbs->parent('entidadBancarias');
    $breadcrumbs->push('Mostrar Registro');
});


// CuentaBanco
Breadcrumbs::register('cuentaBancos', function($breadcrumbs)
{
    $breadcrumbs->parent('bancos-cuentas');
    $breadcrumbs->push('Gestión de Cuentas', route('com.cuentaBancos.index'),['icon' => 'fa fa-thumb-tack']);
});
// CuentaBanco Create
Breadcrumbs::register('cuentaBancosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('cuentaBancos');
    $breadcrumbs->push('Nuevo Registro', route('com.cuentaBancos.create'));
});
// CuentaBanco Edit
Breadcrumbs::register('cuentaBancosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('cuentaBancos');
    $breadcrumbs->push('Editar Registro');
});
// CuentaBanco Show
Breadcrumbs::register('cuentaBancosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('cuentaBancos');
    $breadcrumbs->push('Mostrar Registro');
});



/* -----------------------------------------------------------------------
   MODULO SEGURIDAD
--------------------------------------------------------------------------*/
// Roles
Breadcrumbs::register('rols', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Roles', route('seg.rols.index'),['icon' => 'fa fa-thumb-tack']);
});
// Roles Create
Breadcrumbs::register('rolsCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('rols');
    $breadcrumbs->push('Nuevo Registro', route('seg.rols.create'));
});
// Roles Edit
Breadcrumbs::register('rolsEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('rols');
    $breadcrumbs->push('Editar Registro');
});
// Roles Show
Breadcrumbs::register('rolsShow', function($breadcrumbs)
{
    $breadcrumbs->parent('rols');
    $breadcrumbs->push('Mostrar Registro');
});


// Permisos
Breadcrumbs::register('permisos', function($breadcrumbs)
{
    $breadcrumbs->parent('sistema');
    $breadcrumbs->push('Permisos', route('seg.permisos.index'),['icon' => 'fa fa-thumb-tack']);
});
// Permisos Create
Breadcrumbs::register('permisosCreate', function($breadcrumbs)
{
    $breadcrumbs->parent('permisos');
    $breadcrumbs->push('Nuevo Registro', route('seg.permisos.create'));
});
// Permisos Edit
Breadcrumbs::register('permisosEdit', function($breadcrumbs)
{
    $breadcrumbs->parent('permisos');
    $breadcrumbs->push('Editar Registro');
});
// Permisos Show
Breadcrumbs::register('permisosShow', function($breadcrumbs)
{
    $breadcrumbs->parent('permisos');
    $breadcrumbs->push('Mostrar Registro');
});
