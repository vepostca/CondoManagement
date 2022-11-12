<?php
namespace InnovaCondomi\Clases;

use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Seg\Usuario;
use InnovaCondomi\Entities\Seg\Rol;

class AppContext
{
    private $estaInicializado = false;
    private $clienteActual = null;
    private $orgActual = null;
    private $rol = null;
    private $usuario = null;
    private $nivelAcceso = '';
    private $idioma;
    private $clientesLectura = [];
    private $listaOrgs = [];
    private $orgsLectura = [];
    private $orgsEscritura = [];


    public function estaInicializado(){
        return $this->estaInicializado;
    }

    public function setInicializado($estaInicializado){
        $this->estaInicializado = $estaInicializado;
    }

    public function getClienteActual(){
        return $this->clienteActual;
    }

    public function setClienteActual(Cliente $cliente){
        $this->clienteActual = $cliente;
    }

    public function getOrgActual(){
        return $this->orgActual;
    }

    public function setOrgActual(Org $org){
        return $this->orgActual = $org;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->setNivelAcceso($rol->nivel_acceso);
        $this->orgsEscritura = [];
        $this->orgsLectura = [];
        $this->clientesLectura = [];
        $this->rol = $rol;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getNivelAcceso(){
        return $this->nivelAcceso;
    }

    public function setNivelAcceso($nivelAcceso){
        $this->nivelAcceso = trim($nivelAcceso,'-');
    }

    public function getClientesLectura(){
        if (count($this->clientesLectura) == 0){
            $this->setClientesLectura($this->getRol());
        }
        return $this->clientesLectura;
    }

    /**
     * Calcula los clientes autorizados para acceso de sólo lectura utilizando el nivel de usuario
     * y el rol.
     *
     * @param  Rol $rol Rol usado para inicializar los clientes de sólo lectura
     */
    public function setClientesLectura(Rol $rol){
        if ($this->getNivelAcceso() === 'S'){
            $this->clientesLectura[] = '0';
        }elseif ($rol->cliente->id === '0'){
            $this->clientesLectura[] = '0';
        }else{
            $this->clientesLectura[] = $rol->cliente->id;
            $this->clientesLectura[] = '0';
        }
    }

    /**
     * Obtiene la lista de Orgs a las cuales tiene acceso el Rol suministrado.
     *
     * @param  Rol $rol Rol sobre el cual se buscan las Orgs a las que tiene acceso dicho rol.
     * @return array|mixed
     */
    private function getListaOrgs(Rol $rol){
        if (count($this->listaOrgs) > 0){
            return $this->listaOrgs;
        }
        $this->listaOrgs = $rol->organizaciones;
        return $this->listaOrgs;
    }

    public function getOrgsLectura(){
        if (count($this->orgsLectura) == 0){
            $this->setOrgsLectura($this->getRol());
        }
        return $this->orgsLectura;
    }

    private function setOrgsLectura(Rol $rol){
        $os = $this->getListaOrgs($rol);
        unset($this->orgsLectura);
        $this->orgsLectura = [];
        //Si contiene la Org 0 entonces agregar todas las Orgs del Cliente Actual
        if ($os->contains('id','0')){
            foreach ($this->getOrgs($this->getClienteActual()) as $org){
                $this->orgsLectura[] = $org->id;
            }
        }else{
            foreach ($os as $org){
                $this->orgsLectura[] = $org->id;
            }
        }
    }

    public function getOrgsEscritura(){
        if (count($this->orgsEscritura) == 0){
            $this->setOrgsEscritura($this->getRol());
        }
        return $this->orgsEscritura;
    }

    /**
     * Organizaciones modificables o escribibles son determinadas según:
     * 1.) Si el usuario tiene nivel S o C entonces puede escribir solamente en la Org O (*).
     * 2.) En otros casos, se leen las Orgs desde el rol unicamente: Si el usuario tiene
     * nivel O entonces no puede leer la Org 0 (*)
     *
     * @param  Rol $rol Rol usado para buscar las Orgs a las que tiene acceso.
     */
    public function setOrgsEscritura(Rol $rol){
        $nivelUsuarioAux = $this->getNivelAcceso();
        if (strpos($nivelUsuarioAux,'S') !== false || strpos($nivelUsuarioAux,'C') !== false){
            $this->orgsEscritura['0'] = '0';
        }

        $orgsRol = $this->getListaOrgs($rol);
        foreach ($orgsRol as $org){
            if (!array_key_exists($org->id,$this->orgsEscritura))
                $this->orgsEscritura[$org->id] = $org->id;
        }

        if ($this->getNivelAcceso() === 'O'){
            unset($this->orgsEscritura['0']);
        }
    }

    /**
     * Obtiene la lista de Orgs de un Cliente especificado.
     *
     * @param  Cliente $cliente Cliente sobre el cual se buscaran sus Orgs.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getOrgs(Cliente $cliente){
        return Org::where([
                    ['com_cliente_id', '=', $cliente->id],
                    ['activo', '=', true ]
                 ])
               ->orderBy('nombre', 'asc')
               ->get();
    }


    private function inicializar(Usuario $usuario, $rolId, $clienteId, $orgId){
        $localClienteId = $clienteId;

        if ($usuario == null) $usuario = Auth::user();

        $this->setInicializado(false);

        $this->setUsuario($usuario);

        if ($rolId != null){
            $rol = Rol::where([
                ['id', '=', $rolId],
                ['activo', '=', true ]
            ])
                ->get();
            $this->setRol($rol);
        }else{
            return false;
        }

        if ($orgId != null){
            $org = Org::where([
                ['id', '=', $orgId],
                ['activo', '=', true ]
            ])
                ->get();
            $this->setOrgActual($org);
        }else{
            return false;
        }


    }

}