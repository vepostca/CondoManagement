<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/loginrol','Seg\LoginRolController@getLoginRol');
Route::post('/loginrol','Seg\LoginRolController@postLoginRol');
Route::resource('com/clientes_json', 'Com\ClienteController@getListaClientesJson');
Route::resource('com/orgs_json', 'Com\OrgController@getListaOrgsJson');
Route::resource('com/regiones_json', 'Com\RegionController@getListaRegionesJson');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/home');
    });



//    Route::get('/home', 'HomeController@index');
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::get('/admin',['as' => 'admin', 'uses' => 'HomeController@getAdminHome']);
    //Route::get('/admin', 'HomeController@getAdminHome');

    /*
    |--------------------------------------------------------------------------
    | API routes
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
        Route::group(['prefix' => 'v1'], function () {
            require config('infyom.laravel_generator.path.api_routes');
        });
    });


    Route::get('/test', function () {
//    $usuario = Auth::user();
//    dd($usuario->getRoles());
        $rol = \InnovaCondomi\Entities\Seg\Rol::find('0');
        dd($rol->nivel_acceso);
        return view('auth.loginrol');

    });

    Route::get('com/clientes', ['as' => 'com.clientes.index', 'uses' => 'Com\ClienteController@index']);
    Route::post('com/clientes', ['as' => 'com.clientes.store', 'uses' => 'Com\ClienteController@store']);
    Route::get('com/clientes/create', ['as' => 'com.clientes.create', 'uses' => 'Com\ClienteController@create']);
    Route::put('com/clientes/{clientes}', ['as' => 'com.clientes.update', 'uses' => 'Com\ClienteController@update']);
    Route::patch('com/clientes/{clientes}', ['as' => 'com.clientes.update', 'uses' => 'Com\ClienteController@update']);
    Route::delete('com/clientes/{clientes}', ['as' => 'com.clientes.destroy', 'uses' => 'Com\ClienteController@destroy']);
    Route::get('com/clientes/{clientes}', ['as' => 'com.clientes.show', 'uses' => 'Com\ClienteController@show']);
    Route::get('com/clientes/{clientes}/edit', ['as' => 'com.clientes.edit', 'uses' => 'Com\ClienteController@edit']);


    Route::get('com/orgs', ['as' => 'com.orgs.index', 'uses' => 'Com\OrgController@index']);
    Route::post('com/orgs', ['as' => 'com.orgs.store', 'uses' => 'Com\OrgController@store']);
    Route::get('com/orgs/create', ['as' => 'com.orgs.create', 'uses' => 'Com\OrgController@create']);
    Route::put('com/orgs/{orgs}', ['as' => 'com.orgs.update', 'uses' => 'Com\OrgController@update']);
    Route::patch('com/orgs/{orgs}', ['as' => 'com.orgs.update', 'uses' => 'Com\OrgController@update']);
    Route::delete('com/orgs/{orgs}', ['as' => 'com.orgs.destroy', 'uses' => 'Com\OrgController@destroy']);
    Route::get('com/orgs/{orgs}', ['as' => 'com.orgs.show', 'uses' => 'Com\OrgController@show']);
    Route::get('com/orgs/{orgs}/edit', ['as' => 'com.orgs.edit', 'uses' => 'Com\OrgController@edit']);


    Route::get('com/divisions', ['as' => 'com.divisions.index', 'uses' => 'Com\DivisionController@index']);
    Route::post('com/divisions', ['as' => 'com.divisions.store', 'uses' => 'Com\DivisionController@store']);
    Route::get('com/divisions/create', ['as' => 'com.divisions.create', 'uses' => 'Com\DivisionController@create']);
    Route::put('com/divisions/{divisions}', ['as' => 'com.divisions.update', 'uses' => 'Com\DivisionController@update']);
    Route::patch('com/divisions/{divisions}', ['as' => 'com.divisions.update', 'uses' => 'Com\DivisionController@update']);
    Route::delete('com/divisions/{divisions}', ['as' => 'com.divisions.destroy', 'uses' => 'Com\DivisionController@destroy']);
    Route::get('com/divisions/{divisions}', ['as' => 'com.divisions.show', 'uses' => 'Com\DivisionController@show']);
    Route::get('com/divisions/{divisions}/edit', ['as' => 'com.divisions.edit', 'uses' => 'Com\DivisionController@edit']);


    Route::get('com/pais', ['as' => 'com.pais.index', 'uses' => 'Com\PaisController@index']);
    Route::post('com/pais', ['as' => 'com.pais.store', 'uses' => 'Com\PaisController@store']);
    Route::get('com/pais/create', ['as' => 'com.pais.create', 'uses' => 'Com\PaisController@create']);
    Route::put('com/pais/{pais}', ['as' => 'com.pais.update', 'uses' => 'Com\PaisController@update']);
    Route::patch('com/pais/{pais}', ['as' => 'com.pais.update', 'uses' => 'Com\PaisController@update']);
    Route::delete('com/pais/{pais}', ['as' => 'com.pais.destroy', 'uses' => 'Com\PaisController@destroy']);
    Route::get('com/pais/{pais}', ['as' => 'com.pais.show', 'uses' => 'Com\PaisController@show']);
    Route::get('com/pais/{pais}/edit', ['as' => 'com.pais.edit', 'uses' => 'Com\PaisController@edit']);


    Route::get('com/regions', ['as' => 'com.regions.index', 'uses' => 'Com\RegionController@index']);
    Route::post('com/regions', ['as' => 'com.regions.store', 'uses' => 'Com\RegionController@store']);
    Route::get('com/regions/create', ['as' => 'com.regions.create', 'uses' => 'Com\RegionController@create']);
    Route::put('com/regions/{regions}', ['as' => 'com.regions.update', 'uses' => 'Com\RegionController@update']);
    Route::patch('com/regions/{regions}', ['as' => 'com.regions.update', 'uses' => 'Com\RegionController@update']);
    Route::delete('com/regions/{regions}', ['as' => 'com.regions.destroy', 'uses' => 'Com\RegionController@destroy']);
    Route::get('com/regions/{regions}', ['as' => 'com.regions.show', 'uses' => 'Com\RegionController@show']);
    Route::get('com/regions/{regions}/edit', ['as' => 'com.regions.edit', 'uses' => 'Com\RegionController@edit']);


    Route::get('com/monedas', ['as' => 'com.monedas.index', 'uses' => 'Com\MonedaController@index']);
    Route::post('com/monedas', ['as' => 'com.monedas.store', 'uses' => 'Com\MonedaController@store']);
    Route::get('com/monedas/create', ['as' => 'com.monedas.create', 'uses' => 'Com\MonedaController@create']);
    Route::put('com/monedas/{monedas}', ['as' => 'com.monedas.update', 'uses' => 'Com\MonedaController@update']);
    Route::patch('com/monedas/{monedas}', ['as' => 'com.monedas.update', 'uses' => 'Com\MonedaController@update']);
    Route::delete('com/monedas/{monedas}', ['as' => 'com.monedas.destroy', 'uses' => 'Com\MonedaController@destroy']);
    Route::get('com/monedas/{monedas}', ['as' => 'com.monedas.show', 'uses' => 'Com\MonedaController@show']);
    Route::get('com/monedas/{monedas}/edit', ['as' => 'com.monedas.edit', 'uses' => 'Com\MonedaController@edit']);


    Route::get('com/tipoDireccions', ['as' => 'com.tipoDireccions.index', 'uses' => 'Com\TipoDireccionController@index']);
    Route::post('com/tipoDireccions', ['as' => 'com.tipoDireccions.store', 'uses' => 'Com\TipoDireccionController@store']);
    Route::get('com/tipoDireccions/create', ['as' => 'com.tipoDireccions.create', 'uses' => 'Com\TipoDireccionController@create']);
    Route::put('com/tipoDireccions/{tipoDireccions}', ['as' => 'com.tipoDireccions.update', 'uses' => 'Com\TipoDireccionController@update']);
    Route::patch('com/tipoDireccions/{tipoDireccions}', ['as' => 'com.tipoDireccions.update', 'uses' => 'Com\TipoDireccionController@update']);
    Route::delete('com/tipoDireccions/{tipoDireccions}', ['as' => 'com.tipoDireccions.destroy', 'uses' => 'Com\TipoDireccionController@destroy']);
    Route::get('com/tipoDireccions/{tipoDireccions}', ['as' => 'com.tipoDireccions.show', 'uses' => 'Com\TipoDireccionController@show']);
    Route::get('com/tipoDireccions/{tipoDireccions}/edit', ['as' => 'com.tipoDireccions.edit', 'uses' => 'Com\TipoDireccionController@edit']);


    Route::get('com/tipoTelefonos', ['as' => 'com.tipoTelefonos.index', 'uses' => 'Com\TipoTelefonoController@index']);
    Route::post('com/tipoTelefonos', ['as' => 'com.tipoTelefonos.store', 'uses' => 'Com\TipoTelefonoController@store']);
    Route::get('com/tipoTelefonos/create', ['as' => 'com.tipoTelefonos.create', 'uses' => 'Com\TipoTelefonoController@create']);
    Route::put('com/tipoTelefonos/{tipoTelefonos}', ['as' => 'com.tipoTelefonos.update', 'uses' => 'Com\TipoTelefonoController@update']);
    Route::patch('com/tipoTelefonos/{tipoTelefonos}', ['as' => 'com.tipoTelefonos.update', 'uses' => 'Com\TipoTelefonoController@update']);
    Route::delete('com/tipoTelefonos/{tipoTelefonos}', ['as' => 'com.tipoTelefonos.destroy', 'uses' => 'Com\TipoTelefonoController@destroy']);
    Route::get('com/tipoTelefonos/{tipoTelefonos}', ['as' => 'com.tipoTelefonos.show', 'uses' => 'Com\TipoTelefonoController@show']);
    Route::get('com/tipoTelefonos/{tipoTelefonos}/edit', ['as' => 'com.tipoTelefonos.edit', 'uses' => 'Com\TipoTelefonoController@edit']);


    Route::get('com/tipoContactoWebs', ['as' => 'com.tipoContactoWebs.index', 'uses' => 'Com\TipoContactoWebController@index']);
    Route::post('com/tipoContactoWebs', ['as' => 'com.tipoContactoWebs.store', 'uses' => 'Com\TipoContactoWebController@store']);
    Route::get('com/tipoContactoWebs/create', ['as' => 'com.tipoContactoWebs.create', 'uses' => 'Com\TipoContactoWebController@create']);
    Route::put('com/tipoContactoWebs/{tipoContactoWebs}', ['as' => 'com.tipoContactoWebs.update', 'uses' => 'Com\TipoContactoWebController@update']);
    Route::patch('com/tipoContactoWebs/{tipoContactoWebs}', ['as' => 'com.tipoContactoWebs.update', 'uses' => 'Com\TipoContactoWebController@update']);
    Route::delete('com/tipoContactoWebs/{tipoContactoWebs}', ['as' => 'com.tipoContactoWebs.destroy', 'uses' => 'Com\TipoContactoWebController@destroy']);
    Route::get('com/tipoContactoWebs/{tipoContactoWebs}', ['as' => 'com.tipoContactoWebs.show', 'uses' => 'Com\TipoContactoWebController@show']);
    Route::get('com/tipoContactoWebs/{tipoContactoWebs}/edit', ['as' => 'com.tipoContactoWebs.edit', 'uses' => 'Com\TipoContactoWebController@edit']);


    Route::get('com/tipoCalculoCuotas', ['as' => 'com.tipoCalculoCuotas.index', 'uses' => 'Com\TipoCalculoCuotaController@index']);
    Route::post('com/tipoCalculoCuotas', ['as' => 'com.tipoCalculoCuotas.store', 'uses' => 'Com\TipoCalculoCuotaController@store']);
    Route::get('com/tipoCalculoCuotas/create', ['as' => 'com.tipoCalculoCuotas.create', 'uses' => 'Com\TipoCalculoCuotaController@create']);
    Route::put('com/tipoCalculoCuotas/{tipoCalculoCuotas}', ['as' => 'com.tipoCalculoCuotas.update', 'uses' => 'Com\TipoCalculoCuotaController@update']);
    Route::patch('com/tipoCalculoCuotas/{tipoCalculoCuotas}', ['as' => 'com.tipoCalculoCuotas.update', 'uses' => 'Com\TipoCalculoCuotaController@update']);
    Route::delete('com/tipoCalculoCuotas/{tipoCalculoCuotas}', ['as' => 'com.tipoCalculoCuotas.destroy', 'uses' => 'Com\TipoCalculoCuotaController@destroy']);
    Route::get('com/tipoCalculoCuotas/{tipoCalculoCuotas}', ['as' => 'com.tipoCalculoCuotas.show', 'uses' => 'Com\TipoCalculoCuotaController@show']);
    Route::get('com/tipoCalculoCuotas/{tipoCalculoCuotas}/edit', ['as' => 'com.tipoCalculoCuotas.edit', 'uses' => 'Com\TipoCalculoCuotaController@edit']);


    Route::get('com/tipoInmuebles', ['as' => 'com.tipoInmuebles.index', 'uses' => 'Com\TipoInmuebleController@index']);
    Route::post('com/tipoInmuebles', ['as' => 'com.tipoInmuebles.store', 'uses' => 'Com\TipoInmuebleController@store']);
    Route::get('com/tipoInmuebles/create', ['as' => 'com.tipoInmuebles.create', 'uses' => 'Com\TipoInmuebleController@create']);
    Route::put('com/tipoInmuebles/{tipoInmuebles}', ['as' => 'com.tipoInmuebles.update', 'uses' => 'Com\TipoInmuebleController@update']);
    Route::patch('com/tipoInmuebles/{tipoInmuebles}', ['as' => 'com.tipoInmuebles.update', 'uses' => 'Com\TipoInmuebleController@update']);
    Route::delete('com/tipoInmuebles/{tipoInmuebles}', ['as' => 'com.tipoInmuebles.destroy', 'uses' => 'Com\TipoInmuebleController@destroy']);
    Route::get('com/tipoInmuebles/{tipoInmuebles}', ['as' => 'com.tipoInmuebles.show', 'uses' => 'Com\TipoInmuebleController@show']);
    Route::get('com/tipoInmuebles/{tipoInmuebles}/edit', ['as' => 'com.tipoInmuebles.edit', 'uses' => 'Com\TipoInmuebleController@edit']);


    Route::get('com/tipoPropietarios', ['as' => 'com.tipoPropietarios.index', 'uses' => 'Com\TipoPropietarioController@index']);
    Route::post('com/tipoPropietarios', ['as' => 'com.tipoPropietarios.store', 'uses' => 'Com\TipoPropietarioController@store']);
    Route::get('com/tipoPropietarios/create', ['as' => 'com.tipoPropietarios.create', 'uses' => 'Com\TipoPropietarioController@create']);
    Route::put('com/tipoPropietarios/{tipoPropietarios}', ['as' => 'com.tipoPropietarios.update', 'uses' => 'Com\TipoPropietarioController@update']);
    Route::patch('com/tipoPropietarios/{tipoPropietarios}', ['as' => 'com.tipoPropietarios.update', 'uses' => 'Com\TipoPropietarioController@update']);
    Route::delete('com/tipoPropietarios/{tipoPropietarios}', ['as' => 'com.tipoPropietarios.destroy', 'uses' => 'Com\TipoPropietarioController@destroy']);
    Route::get('com/tipoPropietarios/{tipoPropietarios}', ['as' => 'com.tipoPropietarios.show', 'uses' => 'Com\TipoPropietarioController@show']);
    Route::get('com/tipoPropietarios/{tipoPropietarios}/edit', ['as' => 'com.tipoPropietarios.edit', 'uses' => 'Com\TipoPropietarioController@edit']);


    Route::get('com/clienteInfos', ['as' => 'com.clienteInfos.index', 'uses' => 'Com\ClienteInfoController@index']);
    Route::post('com/clienteInfos', ['as' => 'com.clienteInfos.store', 'uses' => 'Com\ClienteInfoController@store']);
    Route::get('com/clienteInfos/create', ['as' => 'com.clienteInfos.create', 'uses' => 'Com\ClienteInfoController@create']);
    Route::put('com/clienteInfos/{clienteInfos}', ['as' => 'com.clienteInfos.update', 'uses' => 'Com\ClienteInfoController@update']);
    Route::patch('com/clienteInfos/{clienteInfos}', ['as' => 'com.clienteInfos.update', 'uses' => 'Com\ClienteInfoController@update']);
    Route::delete('com/clienteInfos/{clienteInfos}', ['as' => 'com.clienteInfos.destroy', 'uses' => 'Com\ClienteInfoController@destroy']);
    Route::get('com/clienteInfos/{clienteInfos}', ['as' => 'com.clienteInfos.show', 'uses' => 'Com\ClienteInfoController@show']);
    Route::get('com/clienteInfos/{clienteInfos}/edit', ['as' => 'com.clienteInfos.edit', 'uses' => 'Com\ClienteInfoController@edit']);


    Route::get('com/orgInfos', ['as' => 'com.orgInfos.index', 'uses' => 'Com\OrgInfoController@index']);
    Route::post('com/orgInfos', ['as' => 'com.orgInfos.store', 'uses' => 'Com\OrgInfoController@store']);
    Route::get('com/orgInfos/create', ['as' => 'com.orgInfos.create', 'uses' => 'Com\OrgInfoController@create']);
    Route::put('com/orgInfos/{orgInfos}', ['as' => 'com.orgInfos.update', 'uses' => 'Com\OrgInfoController@update']);
    Route::patch('com/orgInfos/{orgInfos}', ['as' => 'com.orgInfos.update', 'uses' => 'Com\OrgInfoController@update']);
    Route::delete('com/orgInfos/{orgInfos}', ['as' => 'com.orgInfos.destroy', 'uses' => 'Com\OrgInfoController@destroy']);
    Route::get('com/orgInfos/{orgInfos}', ['as' => 'com.orgInfos.show', 'uses' => 'Com\OrgInfoController@show']);
    Route::get('com/orgInfos/{orgInfos}/edit', ['as' => 'com.orgInfos.edit', 'uses' => 'Com\OrgInfoController@edit']);


    Route::get('com/inmuebles', ['as' => 'com.inmuebles.index', 'uses' => 'Com\InmuebleController@index']);
    Route::post('com/inmuebles', ['as' => 'com.inmuebles.store', 'uses' => 'Com\InmuebleController@store']);
    Route::get('com/inmuebles/create', ['as' => 'com.inmuebles.create', 'uses' => 'Com\InmuebleController@create']);
    Route::put('com/inmuebles/{inmuebles}', ['as' => 'com.inmuebles.update', 'uses' => 'Com\InmuebleController@update']);
    Route::patch('com/inmuebles/{inmuebles}', ['as' => 'com.inmuebles.update', 'uses' => 'Com\InmuebleController@update']);
    Route::delete('com/inmuebles/{inmuebles}', ['as' => 'com.inmuebles.destroy', 'uses' => 'Com\InmuebleController@destroy']);
    Route::get('com/inmuebles/{inmuebles}', ['as' => 'com.inmuebles.show', 'uses' => 'Com\InmuebleController@show']);
    Route::get('com/inmuebles/{inmuebles}/edit', ['as' => 'com.inmuebles.edit', 'uses' => 'Com\InmuebleController@edit']);


    Route::get('seg/rols', ['as' => 'seg.rols.index', 'uses' => 'Seg\RolController@index']);
    Route::post('seg/rols', ['as' => 'seg.rols.store', 'uses' => 'Seg\RolController@store']);
    Route::get('seg/rols/create', ['as' => 'seg.rols.create', 'uses' => 'Seg\RolController@create']);
    Route::put('seg/rols/{rols}', ['as' => 'seg.rols.update', 'uses' => 'Seg\RolController@update']);
    Route::patch('seg/rols/{rols}', ['as' => 'seg.rols.update', 'uses' => 'Seg\RolController@update']);
    Route::delete('seg/rols/{rols}', ['as' => 'seg.rols.destroy', 'uses' => 'Seg\RolController@destroy']);
    Route::get('seg/rols/{rols}', ['as' => 'seg.rols.show', 'uses' => 'Seg\RolController@show']);
    Route::get('seg/rols/{rols}/edit', ['as' => 'seg.rols.edit', 'uses' => 'Seg\RolController@edit']);


    Route::get('seg/permisos', ['as' => 'seg.permisos.index', 'uses' => 'Seg\PermisoController@index']);
    Route::post('seg/permisos', ['as' => 'seg.permisos.store', 'uses' => 'Seg\PermisoController@store']);
    Route::get('seg/permisos/create', ['as' => 'seg.permisos.create', 'uses' => 'Seg\PermisoController@create']);
    Route::put('seg/permisos/{permisos}', ['as' => 'seg.permisos.update', 'uses' => 'Seg\PermisoController@update']);
    Route::patch('seg/permisos/{permisos}', ['as' => 'seg.permisos.update', 'uses' => 'Seg\PermisoController@update']);
    Route::delete('seg/permisos/{permisos}', ['as' => 'seg.permisos.destroy', 'uses' => 'Seg\PermisoController@destroy']);
    Route::get('seg/permisos/{permisos}', ['as' => 'seg.permisos.show', 'uses' => 'Seg\PermisoController@show']);
    Route::get('seg/permisos/{permisos}/edit', ['as' => 'seg.permisos.edit', 'uses' => 'Seg\PermisoController@edit']);

    Route::get('com/formaPagos', ['as'=> 'com.formaPagos.index', 'uses' => 'Com\FormaPagoController@index']);
    Route::post('com/formaPagos', ['as'=> 'com.formaPagos.store', 'uses' => 'Com\FormaPagoController@store']);
    Route::get('com/formaPagos/create', ['as'=> 'com.formaPagos.create', 'uses' => 'Com\FormaPagoController@create']);
    Route::put('com/formaPagos/{formaPagos}', ['as'=> 'com.formaPagos.update', 'uses' => 'Com\FormaPagoController@update']);
    Route::patch('com/formaPagos/{formaPagos}', ['as'=> 'com.formaPagos.update', 'uses' => 'Com\FormaPagoController@update']);
    Route::delete('com/formaPagos/{formaPagos}', ['as'=> 'com.formaPagos.destroy', 'uses' => 'Com\FormaPagoController@destroy']);
    Route::get('com/formaPagos/{formaPagos}', ['as'=> 'com.formaPagos.show', 'uses' => 'Com\FormaPagoController@show']);
    Route::get('com/formaPagos/{formaPagos}/edit', ['as'=> 'com.formaPagos.edit', 'uses' => 'Com\FormaPagoController@edit']);

    Route::get('com/tipoCuentaBancos', ['as'=> 'com.tipoCuentaBancos.index', 'uses' => 'Com\TipoCuentaBancoController@index']);
    Route::post('com/tipoCuentaBancos', ['as'=> 'com.tipoCuentaBancos.store', 'uses' => 'Com\TipoCuentaBancoController@store']);
    Route::get('com/tipoCuentaBancos/create', ['as'=> 'com.tipoCuentaBancos.create', 'uses' => 'Com\TipoCuentaBancoController@create']);
    Route::put('com/tipoCuentaBancos/{tipoCuentaBancos}', ['as'=> 'com.tipoCuentaBancos.update', 'uses' => 'Com\TipoCuentaBancoController@update']);
    Route::patch('com/tipoCuentaBancos/{tipoCuentaBancos}', ['as'=> 'com.tipoCuentaBancos.update', 'uses' => 'Com\TipoCuentaBancoController@update']);
    Route::delete('com/tipoCuentaBancos/{tipoCuentaBancos}', ['as'=> 'com.tipoCuentaBancos.destroy', 'uses' => 'Com\TipoCuentaBancoController@destroy']);
    Route::get('com/tipoCuentaBancos/{tipoCuentaBancos}', ['as'=> 'com.tipoCuentaBancos.show', 'uses' => 'Com\TipoCuentaBancoController@show']);
    Route::get('com/tipoCuentaBancos/{tipoCuentaBancos}/edit', ['as'=> 'com.tipoCuentaBancos.edit', 'uses' => 'Com\TipoCuentaBancoController@edit']);

    Route::get('pro/actividadProveedors', ['as'=> 'pro.actividadProveedors.index', 'uses' => 'Pro\ActividadProveedorController@index']);
    Route::post('pro/actividadProveedors', ['as'=> 'pro.actividadProveedors.store', 'uses' => 'Pro\ActividadProveedorController@store']);
    Route::get('pro/actividadProveedors/create', ['as'=> 'pro.actividadProveedors.create', 'uses' => 'Pro\ActividadProveedorController@create']);
    Route::put('pro/actividadProveedors/{actividadProveedors}', ['as'=> 'pro.actividadProveedors.update', 'uses' => 'Pro\ActividadProveedorController@update']);
    Route::patch('pro/actividadProveedors/{actividadProveedors}', ['as'=> 'pro.actividadProveedors.update', 'uses' => 'Pro\ActividadProveedorController@update']);
    Route::delete('pro/actividadProveedors/{actividadProveedors}', ['as'=> 'pro.actividadProveedors.destroy', 'uses' => 'Pro\ActividadProveedorController@destroy']);
    Route::get('pro/actividadProveedors/{actividadProveedors}', ['as'=> 'pro.actividadProveedors.show', 'uses' => 'Pro\ActividadProveedorController@show']);
    Route::get('pro/actividadProveedors/{actividadProveedors}/edit', ['as'=> 'pro.actividadProveedors.edit', 'uses' => 'Pro\ActividadProveedorController@edit']);

    Route::get('com/estatusTareas', ['as'=> 'com.estatusTareas.index', 'uses' => 'Com\EstatusTareaController@index']);
    Route::post('com/estatusTareas', ['as'=> 'com.estatusTareas.store', 'uses' => 'Com\EstatusTareaController@store']);
    Route::get('com/estatusTareas/create', ['as'=> 'com.estatusTareas.create', 'uses' => 'Com\EstatusTareaController@create']);
    Route::put('com/estatusTareas/{estatusTareas}', ['as'=> 'com.estatusTareas.update', 'uses' => 'Com\EstatusTareaController@update']);
    Route::patch('com/estatusTareas/{estatusTareas}', ['as'=> 'com.estatusTareas.update', 'uses' => 'Com\EstatusTareaController@update']);
    Route::delete('com/estatusTareas/{estatusTareas}', ['as'=> 'com.estatusTareas.destroy', 'uses' => 'Com\EstatusTareaController@destroy']);
    Route::get('com/estatusTareas/{estatusTareas}', ['as'=> 'com.estatusTareas.show', 'uses' => 'Com\EstatusTareaController@show']);
    Route::get('com/estatusTareas/{estatusTareas}/edit', ['as'=> 'com.estatusTareas.edit', 'uses' => 'Com\EstatusTareaController@edit']);

    Route::get('com/fondos', ['as'=> 'com.fondos.index', 'uses' => 'Com\FondoController@index']);
    Route::post('com/fondos', ['as'=> 'com.fondos.store', 'uses' => 'Com\FondoController@store']);
    Route::get('com/fondos/create', ['as'=> 'com.fondos.create', 'uses' => 'Com\FondoController@create']);
    Route::put('com/fondos/{fondos}', ['as'=> 'com.fondos.update', 'uses' => 'Com\FondoController@update']);
    Route::patch('com/fondos/{fondos}', ['as'=> 'com.fondos.update', 'uses' => 'Com\FondoController@update']);
    Route::delete('com/fondos/{fondos}', ['as'=> 'com.fondos.destroy', 'uses' => 'Com\FondoController@destroy']);
    Route::get('com/fondos/{fondos}', ['as'=> 'com.fondos.show', 'uses' => 'Com\FondoController@show']);
    Route::get('com/fondos/{fondos}/edit', ['as'=> 'com.fondos.edit', 'uses' => 'Com\FondoController@edit']);

    Route::get('pro/proveedors', ['as'=> 'pro.proveedors.index', 'uses' => 'Pro\ProveedorController@index']);
    Route::post('pro/proveedors', ['as'=> 'pro.proveedors.store', 'uses' => 'Pro\ProveedorController@store']);
    Route::get('pro/proveedors/create', ['as'=> 'pro.proveedors.create', 'uses' => 'Pro\ProveedorController@create']);
    Route::put('pro/proveedors/{proveedors}', ['as'=> 'pro.proveedors.update', 'uses' => 'Pro\ProveedorController@update']);
    Route::patch('pro/proveedors/{proveedors}', ['as'=> 'pro.proveedors.update', 'uses' => 'Pro\ProveedorController@update']);
    Route::delete('pro/proveedors/{proveedors}', ['as'=> 'pro.proveedors.destroy', 'uses' => 'Pro\ProveedorController@destroy']);
    Route::get('pro/proveedors/{proveedors}', ['as'=> 'pro.proveedors.show', 'uses' => 'Pro\ProveedorController@show']);
    Route::get('pro/proveedors/{proveedors}/edit', ['as'=> 'pro.proveedors.edit', 'uses' => 'Pro\ProveedorController@edit']);

    Route::get('com/categoriaConceptos', ['as'=> 'com.categoriaConceptos.index', 'uses' => 'Com\CategoriaConceptoController@index']);
    Route::post('com/categoriaConceptos', ['as'=> 'com.categoriaConceptos.store', 'uses' => 'Com\CategoriaConceptoController@store']);
    Route::get('com/categoriaConceptos/create', ['as'=> 'com.categoriaConceptos.create', 'uses' => 'Com\CategoriaConceptoController@create']);
    Route::put('com/categoriaConceptos/{categoriaConceptos}', ['as'=> 'com.categoriaConceptos.update', 'uses' => 'Com\CategoriaConceptoController@update']);
    Route::patch('com/categoriaConceptos/{categoriaConceptos}', ['as'=> 'com.categoriaConceptos.update', 'uses' => 'Com\CategoriaConceptoController@update']);
    Route::delete('com/categoriaConceptos/{categoriaConceptos}', ['as'=> 'com.categoriaConceptos.destroy', 'uses' => 'Com\CategoriaConceptoController@destroy']);
    Route::get('com/categoriaConceptos/{categoriaConceptos}', ['as'=> 'com.categoriaConceptos.show', 'uses' => 'Com\CategoriaConceptoController@show']);
    Route::get('com/categoriaConceptos/{categoriaConceptos}/edit', ['as'=> 'com.categoriaConceptos.edit', 'uses' => 'Com\CategoriaConceptoController@edit']);

    Route::get('com/conceptos', ['as'=> 'com.conceptos.index', 'uses' => 'Com\ConceptoController@index']);
    Route::post('com/conceptos', ['as'=> 'com.conceptos.store', 'uses' => 'Com\ConceptoController@store']);
    Route::get('com/conceptos/create', ['as'=> 'com.conceptos.create', 'uses' => 'Com\ConceptoController@create']);
    Route::put('com/conceptos/{conceptos}', ['as'=> 'com.conceptos.update', 'uses' => 'Com\ConceptoController@update']);
    Route::patch('com/conceptos/{conceptos}', ['as'=> 'com.conceptos.update', 'uses' => 'Com\ConceptoController@update']);
    Route::delete('com/conceptos/{conceptos}', ['as'=> 'com.conceptos.destroy', 'uses' => 'Com\ConceptoController@destroy']);
    Route::get('com/conceptos/{conceptos}', ['as'=> 'com.conceptos.show', 'uses' => 'Com\ConceptoController@show']);
    Route::get('com/conceptos/{conceptos}/edit', ['as'=> 'com.conceptos.edit', 'uses' => 'Com\ConceptoController@edit']);

    Route::get('com/instalacions', ['as'=> 'com.instalacions.index', 'uses' => 'Com\InstalacionController@index']);
    Route::post('com/instalacions', ['as'=> 'com.instalacions.store', 'uses' => 'Com\InstalacionController@store']);
    Route::get('com/instalacions/create', ['as'=> 'com.instalacions.create', 'uses' => 'Com\InstalacionController@create']);
    Route::put('com/instalacions/{instalacions}', ['as'=> 'com.instalacions.update', 'uses' => 'Com\InstalacionController@update']);
    Route::patch('com/instalacions/{instalacions}', ['as'=> 'com.instalacions.update', 'uses' => 'Com\InstalacionController@update']);
    Route::delete('com/instalacions/{instalacions}', ['as'=> 'com.instalacions.destroy', 'uses' => 'Com\InstalacionController@destroy']);
    Route::get('com/instalacions/{instalacions}', ['as'=> 'com.instalacions.show', 'uses' => 'Com\InstalacionController@show']);
    Route::get('com/instalacions/{instalacions}/edit', ['as'=> 'com.instalacions.edit', 'uses' => 'Com\InstalacionController@edit']);

    Route::get('com/estacionamientos', ['as'=> 'com.estacionamientos.index', 'uses' => 'Com\EstacionamientoController@index']);
    Route::post('com/estacionamientos', ['as'=> 'com.estacionamientos.store', 'uses' => 'Com\EstacionamientoController@store']);
    Route::get('com/estacionamientos/create', ['as'=> 'com.estacionamientos.create', 'uses' => 'Com\EstacionamientoController@create']);
    Route::put('com/estacionamientos/{estacionamientos}', ['as'=> 'com.estacionamientos.update', 'uses' => 'Com\EstacionamientoController@update']);
    Route::patch('com/estacionamientos/{estacionamientos}', ['as'=> 'com.estacionamientos.update', 'uses' => 'Com\EstacionamientoController@update']);
    Route::delete('com/estacionamientos/{estacionamientos}', ['as'=> 'com.estacionamientos.destroy', 'uses' => 'Com\EstacionamientoController@destroy']);
    Route::get('com/estacionamientos/{estacionamientos}', ['as'=> 'com.estacionamientos.show', 'uses' => 'Com\EstacionamientoController@show']);
    Route::get('com/estacionamientos/{estacionamientos}/edit', ['as'=> 'com.estacionamientos.edit', 'uses' => 'Com\EstacionamientoController@edit']);

    Route::get('com/recargos', ['as'=> 'com.recargos.index', 'uses' => 'Com\RecargoController@index']);
    Route::post('com/recargos', ['as'=> 'com.recargos.store', 'uses' => 'Com\RecargoController@store']);
    Route::get('com/recargos/create', ['as'=> 'com.recargos.create', 'uses' => 'Com\RecargoController@create']);
    Route::put('com/recargos/{recargos}', ['as'=> 'com.recargos.update', 'uses' => 'Com\RecargoController@update']);
    Route::patch('com/recargos/{recargos}', ['as'=> 'com.recargos.update', 'uses' => 'Com\RecargoController@update']);
    Route::delete('com/recargos/{recargos}', ['as'=> 'com.recargos.destroy', 'uses' => 'Com\RecargoController@destroy']);
    Route::get('com/recargos/{recargos}', ['as'=> 'com.recargos.show', 'uses' => 'Com\RecargoController@show']);
    Route::get('com/recargos/{recargos}/edit', ['as'=> 'com.recargos.edit', 'uses' => 'Com\RecargoController@edit']);

    Route::get('com/descuentos', ['as'=> 'com.descuentos.index', 'uses' => 'Com\DescuentoController@index']);
    Route::post('com/descuentos', ['as'=> 'com.descuentos.store', 'uses' => 'Com\DescuentoController@store']);
    Route::get('com/descuentos/create', ['as'=> 'com.descuentos.create', 'uses' => 'Com\DescuentoController@create']);
    Route::put('com/descuentos/{descuentos}', ['as'=> 'com.descuentos.update', 'uses' => 'Com\DescuentoController@update']);
    Route::patch('com/descuentos/{descuentos}', ['as'=> 'com.descuentos.update', 'uses' => 'Com\DescuentoController@update']);
    Route::delete('com/descuentos/{descuentos}', ['as'=> 'com.descuentos.destroy', 'uses' => 'Com\DescuentoController@destroy']);
    Route::get('com/descuentos/{descuentos}', ['as'=> 'com.descuentos.show', 'uses' => 'Com\DescuentoController@show']);
    Route::get('com/descuentos/{descuentos}/edit', ['as'=> 'com.descuentos.edit', 'uses' => 'Com\DescuentoController@edit']);

    Route::get('com/propietarios', ['as'=> 'com.propietarios.index', 'uses' => 'Com\PropietarioController@index']);
    Route::post('com/propietarios', ['as'=> 'com.propietarios.store', 'uses' => 'Com\PropietarioController@store']);
    Route::get('com/propietarios/create', ['as'=> 'com.propietarios.create', 'uses' => 'Com\PropietarioController@create']);
    Route::put('com/propietarios/{propietarios}', ['as'=> 'com.propietarios.update', 'uses' => 'Com\PropietarioController@update']);
    Route::patch('com/propietarios/{propietarios}', ['as'=> 'com.propietarios.update', 'uses' => 'Com\PropietarioController@update']);
    Route::delete('com/propietarios/{propietarios}', ['as'=> 'com.propietarios.destroy', 'uses' => 'Com\PropietarioController@destroy']);
    Route::get('com/propietarios/{propietarios}', ['as'=> 'com.propietarios.show', 'uses' => 'Com\PropietarioController@show']);
    Route::get('com/propietarios/{propietarios}/edit', ['as'=> 'com.propietarios.edit', 'uses' => 'Com\PropietarioController@edit']);

    Route::get('com/propietarioInmuebles', ['as'=> 'com.propietarioInmuebles.index', 'uses' => 'Com\PropietarioInmuebleController@index']);
    Route::post('com/propietarioInmuebles', ['as'=> 'com.propietarioInmuebles.store', 'uses' => 'Com\PropietarioInmuebleController@store']);
    Route::get('com/propietarioInmuebles/create', ['as'=> 'com.propietarioInmuebles.create', 'uses' => 'Com\PropietarioInmuebleController@create']);
    Route::put('com/propietarioInmuebles/{propietarioInmuebles}', ['as'=> 'com.propietarioInmuebles.update', 'uses' => 'Com\PropietarioInmuebleController@update']);
    Route::patch('com/propietarioInmuebles/{propietarioInmuebles}', ['as'=> 'com.propietarioInmuebles.update', 'uses' => 'Com\PropietarioInmuebleController@update']);
    Route::delete('com/propietarioInmuebles/{propietarioInmuebles}', ['as'=> 'com.propietarioInmuebles.destroy', 'uses' => 'Com\PropietarioInmuebleController@destroy']);
    Route::get('com/propietarioInmuebles/{propietarioInmuebles}', ['as'=> 'com.propietarioInmuebles.show', 'uses' => 'Com\PropietarioInmuebleController@show']);
    Route::get('com/propietarioInmuebles/{propietarioInmuebles}/edit', ['as'=> 'com.propietarioInmuebles.edit', 'uses' => 'Com\PropietarioInmuebleController@edit']);

    Route::get('com/entidadBancarias', ['as'=> 'com.entidadBancarias.index', 'uses' => 'Com\EntidadBancariaController@index']);
    Route::post('com/entidadBancarias', ['as'=> 'com.entidadBancarias.store', 'uses' => 'Com\EntidadBancariaController@store']);
    Route::get('com/entidadBancarias/create', ['as'=> 'com.entidadBancarias.create', 'uses' => 'Com\EntidadBancariaController@create']);
    Route::put('com/entidadBancarias/{entidadBancarias}', ['as'=> 'com.entidadBancarias.update', 'uses' => 'Com\EntidadBancariaController@update']);
    Route::patch('com/entidadBancarias/{entidadBancarias}', ['as'=> 'com.entidadBancarias.update', 'uses' => 'Com\EntidadBancariaController@update']);
    Route::delete('com/entidadBancarias/{entidadBancarias}', ['as'=> 'com.entidadBancarias.destroy', 'uses' => 'Com\EntidadBancariaController@destroy']);
    Route::get('com/entidadBancarias/{entidadBancarias}', ['as'=> 'com.entidadBancarias.show', 'uses' => 'Com\EntidadBancariaController@show']);
    Route::get('com/entidadBancarias/{entidadBancarias}/edit', ['as'=> 'com.entidadBancarias.edit', 'uses' => 'Com\EntidadBancariaController@edit']);

    Route::get('com/cuentaBancos', ['as'=> 'com.cuentaBancos.index', 'uses' => 'Com\CuentaBancoController@index']);
    Route::post('com/cuentaBancos', ['as'=> 'com.cuentaBancos.store', 'uses' => 'Com\CuentaBancoController@store']);
    Route::get('com/cuentaBancos/create', ['as'=> 'com.cuentaBancos.create', 'uses' => 'Com\CuentaBancoController@create']);
    Route::put('com/cuentaBancos/{cuentaBancos}', ['as'=> 'com.cuentaBancos.update', 'uses' => 'Com\CuentaBancoController@update']);
    Route::patch('com/cuentaBancos/{cuentaBancos}', ['as'=> 'com.cuentaBancos.update', 'uses' => 'Com\CuentaBancoController@update']);
    Route::delete('com/cuentaBancos/{cuentaBancos}', ['as'=> 'com.cuentaBancos.destroy', 'uses' => 'Com\CuentaBancoController@destroy']);
    Route::get('com/cuentaBancos/{cuentaBancos}', ['as'=> 'com.cuentaBancos.show', 'uses' => 'Com\CuentaBancoController@show']);
    Route::get('com/cuentaBancos/{cuentaBancos}/edit', ['as'=> 'com.cuentaBancos.edit', 'uses' => 'Com\CuentaBancoController@edit']);

});

Route::get('tes/tests', ['as'=> 'tes.tests.index', 'uses' => 'Tes\TestController@index']);
Route::post('tes/tests', ['as'=> 'tes.tests.store', 'uses' => 'Tes\TestController@store']);
Route::get('tes/tests/create', ['as'=> 'tes.tests.create', 'uses' => 'Tes\TestController@create']);
Route::put('tes/tests/{tests}', ['as'=> 'tes.tests.update', 'uses' => 'Tes\TestController@update']);
Route::patch('tes/tests/{tests}', ['as'=> 'tes.tests.update', 'uses' => 'Tes\TestController@update']);
Route::delete('tes/tests/{tests}', ['as'=> 'tes.tests.destroy', 'uses' => 'Tes\TestController@destroy']);
Route::get('tes/tests/{tests}', ['as'=> 'tes.tests.show', 'uses' => 'Tes\TestController@show']);
Route::get('tes/tests/{tests}/edit', ['as'=> 'tes.tests.edit', 'uses' => 'Tes\TestController@edit']);

