<?php
namespace InnovaCondomi\Clases;

use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Seg\Rol;

class LoginUtils
{
    /**
     * Crea una variable arreglo con valores para el Contexto de la Aplicación en la Sesión Actual.
     */
    public static function crearContextoAp(){
        $contextoAp['rolActual']['id'] = '';
        $contextoAp['clienteActual']['id'] = '';
        $contextoAp['orgActual']['id'] = '';
        \Session::put('contextoAp',$contextoAp);
        return $contextoAp;
    }

    /**
     * Verificar solamente si el Contexto de la Aplicación está creado en la Sesión Actual.
     *
     * @return bool
     */
    public static function contextoApCreado(){
        return \Session::has('contextoAp');
    }

    /**
     * Además de verificar si el contexto de la aplicación está creado, también se verifica que las variables
     * del arreglo estén establecidas con valores válidos.
     *
     * @return bool
     */
    public static  function contextoApIniciado(){
        if (self::contextoApCreado()){
            if (strlen(\Session::get('contextoAp.rolActual.id')) > 0 &&
                strlen(\Session::get('contextoAp.clienteActual.id')) > 0 &&
                strlen(\Session::get('contextoAp.orgActual.id')) >0)
            {
                return true;
            }else return false;
        }else
        {
            return false;
        }
    }

    /**
     * Retorna el arreglo de variables del contexto de la aplicación si éste se ha iniciado.
     * Devuelve null si el contexto de la aplicación no se ha iniciado.
     * @return mixed|null
     */
    public static function getContextoAp(){
        if (self::contextoApIniciado()){
            return \Session::get('contextoAp');
        }else{
            return null;
        }
    }

    public static function getListaRolOrg($rolId){

    }

    public static function getArrListaClientes($listaRolOrg){
        $listaClientes = [];
        $clienteActual = null;
        foreach ($listaRolOrg as $rolOrg){
            if ($clienteActual == null || $clienteActual !== $rolOrg->com_cliente_id){
                $clienteActual = $rolOrg->com_cliente_id;

                $listaClientes[] = $rolOrg->com_cliente_id;
            }
        }
        return $listaClientes;
    }
    public static function getStrListaClientes($listaRolOrg){
        $listaClientes = '';
        $clienteActual = null;
        foreach ($listaRolOrg as $rolOrg){
            if ($clienteActual == null || $clienteActual !== $rolOrg->com_cliente_id){
                $clienteActual = $rolOrg->com_cliente_id;

                if (strlen($listaClientes) > 0){
                    $listaClientes .= ',';
                }
                $listaClientes .= '\'';
                $listaClientes .= $rolOrg->com_cliente_id;
                $listaClientes .= '\'';
            }
        }
        return $listaClientes;
    }

    public static function getStrListaOrgs($listaRolOrg){
        $listaOrgs = '';
        foreach($listaRolOrg as $rolOrg){
            if (strlen($listaOrgs) > 0 ){
                $listaOrgs .= ',';
            }
            $listaOrgs .= $rolOrg->com_org_id;
        }
        return $listaOrgs;
    }

    public static function getArrListaOrgs($listaRolOrg){
        $listaOrgs = [];
        foreach($listaRolOrg as $rolOrg){
            $listaOrgs[] = $rolOrg->com_org_id;
        }
        return $listaOrgs;
    }


    /**
     * Calcula los clientes autorizados para acceso de sólo lectura utilizando el nivel de usuario
     * y el rol.
     *
     * @param  Rol $rol Rol usado para inicializar los clientes de sólo lectura
     * @return array
     */
    public static function getClientesLectura(Rol $rol){
        $arrClientes = [];
        if (trim($rol->nivel_acceso,'-') == 'S'){
            $arrClientes[] = '0';
        }elseif ($rol->cliente->id == '0'){
            $arrClientes[] = '0';
        }else{
            $arrClientes[] = $rol->com_cliente_id;
        }
        return $arrClientes;
    }

    public static function getOrgsLectura(Rol $rol,$com_cliente_id, $rolOrg){
        //$rolOrg = $rol->organizaciones;
        $orgsLectura = [];
        //Si contiene la Org 0 entonces agregar todas las Orgs del Cliente Actual
        if ($rolOrg->contains('id','0')){
            foreach (self::getOrgs($com_cliente_id) as $org){
                $orgsLectura[] = $org->id;
            }
        }else{
            foreach ($rolOrg as $org){
                $orgsLectura[] = $org->id;
            }
        }

        return $orgsLectura;
    }

    /**
     * Obtiene la lista de Orgs de un Cliente especificado.
     *
     * @param $com_cliente_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private static function getOrgs($com_cliente_id){
        return Org::where([
            ['com_cliente_id', '=', $com_cliente_id],
            ['activo', '=', true ]
        ])
            ->orderBy('nombre', 'asc')
            ->get();
    }

    /**
     * Organizaciones modificables o escribibles son determinadas según:
     * 1.) Si el usuario tiene nivel S o C entonces puede escribir solamente en la Org O (*).
     * 2.) En otros casos, se leen las Orgs desde el rol unicamente: Si el usuario tiene
     * nivel O entonces no puede leer la Org 0 (*)
     *
     * @param  Rol $rol Rol usado para buscar las Orgs a las que tiene acceso.
     * @param \Illuminate\Database\Eloquent\Relations\BelongsToMany $rolOrg Organizaciones permitidas por Rol.
     * @return array
     */
    public static function getOrgsEscritura(Rol $rol, $rolOrg){
        $nivelUsuarioAux = trim($rol->nivel_acceso,'-');
        $orgsEscritura  = [];
        if (strpos($nivelUsuarioAux,'S') !== false || strpos($nivelUsuarioAux,'C') !== false){
            $orgsEscritura['0'] = '0';
        }

        //$rolOrg = $rol->organizaciones;
        foreach ($rolOrg as $org){
            if (!array_key_exists($org->id,$orgsEscritura))
                $orgsEscritura[$org->id] = $org->id;
        }

        if ($nivelUsuarioAux == 'O'){
            unset($orgsEscritura['0']);
        }

        return $orgsEscritura;
    }
}