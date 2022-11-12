<?php

namespace InnovaCondomi\Http\Controllers\Seg;

use InnovaCondomi\Clases\LoginUtils;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Seg\Rol;
use Validator;
use Illuminate\Http\Request;

use InnovaCondomi\Http\Requests;
use InnovaCondomi\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRolController extends Controller
{
    /**
     * Muestra el formulario para seleccionar el Rol, Cliente y Org.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoginRol()
    {
        if (Auth::check()){
            return $this->showLoginRolForm();
        }else return response('Unauthorized.', 401);

    }

    /**
     * Muestra el formulario para seleccionar el Rol, Cliente y Org.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginRolForm()
    {
        $usuario = Auth::user();
        $roles = $usuario->getRoles();
        $numRoles = count($roles);
        /*if ($numRoles == 1){
            $rol = $roles[0];
            $listaOrgs = $rol->organizaciones;
            dd($listaOrgs);
        }*/
        $rolesUsuario = $usuario->getRoles()->lists('nombre','id')->prepend('Seleccione Rol','');
        //dd($rolesUsuario);
        return view('auth.loginrol')->with('rolesUsuario',$rolesUsuario);
    }

    /**
     * Manejar una petición de selección de rol, Cliente y Organizacion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLoginRol(Request $request)
    {
        if (Auth::check()){
            return $this->loginRol($request);
        }else{
            return response('Unauthorized.', 401);
        }

    }

    protected function loginRol(Request $request)
    {
        $this->validate($request, [
            'seg_rol' => 'required',
            'com_cliente' => 'required',
            'com_org' => 'required',
        ]);

        $rol = Rol::find($request->input('seg_rol'));
        $cliente = Cliente::find($request->input('com_cliente'));
        $org = Org::find($request->input('com_org'));

        $rolOrg = $rol->organizaciones;
        $clientesLectura = LoginUtils::getClientesLectura($rol);
        $orgsLectura = LoginUtils::getOrgsLectura($rol,$request->input('com_cliente'), $rolOrg);
        $orgsEscritura = LoginUtils::getOrgsEscritura($rol,$rolOrg);

        $request->session()->put('contextoAp.rolActual.id',$request->input('seg_rol'));
        $request->session()->put('contextoAp.rolActual.nombre',$rol->nombre);
        $request->session()->put('contextoAp.rolActual.nivelAcceso',trim($rol->nivel_acceso,'-'));

        $request->session()->put('contextoAp.clienteActual.id',$request->input('com_cliente'));
        $request->session()->put('contextoAp.clienteActual.nombre',$cliente->nombre);

        $request->session()->put('contextoAp.orgActual.id',$request->input('com_org'));
        $request->session()->put('contextoAp.orgActual.nombre',$org->nombre);

        $request->session()->put('contextoAp.clientesLectura',$clientesLectura);
        $request->session()->put('contextoAp.orgsLectura',$orgsLectura);
        $request->session()->put('contextoAp.orgsEscritura',$orgsEscritura);

        //dd($request->session());
        return redirect()->intended('/home');
    }
}
