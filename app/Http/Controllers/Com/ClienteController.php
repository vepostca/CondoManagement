<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\Clases\LoginUtils;
use InnovaCondomi\DataTables\Com\ClienteDataTable;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Pais;
use InnovaCondomi\Entities\Com\Region;
use InnovaCondomi\Entities\Com\TipoContactoWeb;
use InnovaCondomi\Entities\Com\TipoDireccion;
use InnovaCondomi\Entities\Com\TipoTelefono;
use InnovaCondomi\Entities\Seg\Rol;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateClienteRequest;
use InnovaCondomi\Http\Requests\Com\UpdateClienteRequest;
use InnovaCondomi\Repositories\Com\ClienteRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;

class ClienteController extends AppBaseController
{
    /** @var  ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        //$this->middleware('auth');
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param ClienteDataTable $clienteDataTable
     * @return Response
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('com.clientes.index');
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        $tipoDireccion = TipoDireccion::orderBy('nombre','ASC')->lists('nombre','id');
        $paises = Pais::orderBy('nombre','ASC')->lists('nombre','id')->prepend('Seleccione País','');
        //$regiones = Region::orderBy('nombre','ASC')->lists('nombre','id');
        $regiones = [];
        $tipoTelefono = TipoTelefono::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoContactoWeb = TipoContactoWeb::orderBy('nombre','ASC')->lists('nombre','id');
        $dirs = [];
        $nDirs = count($dirs);
        if ($nDirs == 0){$nDirs +=1;}

        $telfs = [];
        $nTelfs = count($telfs);
        if ($nTelfs == 0){$nTelfs +=1;}

        $webs = [];
        $nWebs = count($webs);
        if ($nWebs == 0){$nWebs +=1;}

        $labelRegion = 'Región';
        return view('com.clientes.create')
            ->with('tipoDireccion',$tipoDireccion)
            ->with('paises',$paises)
            ->with('regiones',$regiones)
            ->with('tipoTelefono',$tipoTelefono)
            ->with('tipoContactoWeb',$tipoContactoWeb)
            ->with('nDirs',$nDirs)->with('nTelfs',$nTelfs)->with('nWebs',$nWebs)
            ->with('labelRegion',$labelRegion);
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $ip = $request->getClientIp();
        $request->request->add(['borrado'=>false,
            'created_ip'=> $ip,
            'updated_ip'=>$ip]);
        $input = $request->all();
        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $cliente = $this->clienteRepository->create($input);

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $cliente->id;
            $direccion['com_org_id'] = $cliente->com_org_id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $cliente->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $cliente->id;
            $telefono['com_org_id'] = $cliente->com_org_id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $cliente->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $cliente->id;
            $web['com_org_id'] = $cliente->com_org_id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $cliente->contactosWeb()->create($web);
        }

        Flash::success('Datos de la Compañía grabados con éxito.');

        return redirect(route('com.clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository
            ->with('org')->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Compañía No Encontrada');
            return redirect(route('com.clientes.index'));
        }
        return view('com.clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Compañía No Encontrada.');
            return redirect(route('com.clientes.index'));
        }
        $tipoDireccion = TipoDireccion::orderBy('nombre','ASC')->lists('nombre','id');
        $paises = Pais::orderBy('nombre','ASC')->lists('nombre','id')->prepend('Seleccione País','');
        $regiones = Region::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoTelefono = TipoTelefono::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoContactoWeb = TipoContactoWeb::orderBy('nombre','ASC')->lists('nombre','id');
        $dirs = $cliente->direcciones()->select('id','com_tipo_direccion_id','com_pais_id',
            'com_region_id','ciudad','linea_dir')->get();
        $nDirs = count($dirs);

        $telfs = $cliente->telefonos()->get();
        $nTelfs = count($telfs);

        $webs = $cliente->contactosWeb()->select('id','com_tipo_contacto_web_id','valor','es_principal','notas')
                        ->get();
        $nWebs = count($webs);

        $labelRegion = 'Región';

        //dd($cliente->contactosWeb()->get());
        return view('com.clientes.edit')
            ->with('cliente', $cliente)
            ->with('tipoDireccion',$tipoDireccion)
            ->with('paises',$paises)
            ->with('regiones',$regiones)
            ->with('tipoContactoWeb',$tipoContactoWeb)
            ->with('tipoTelefono',$tipoTelefono)
            ->with('dirs',$dirs->toJson())->with('nDirs',$nDirs)
            ->with('webs',$webs->toJson())->with('nWebs',$nWebs)
            ->with('telfs',$telfs->toJson())->with('nTelfs',$nTelfs)
            ->with('labelRegion',$labelRegion);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param  int              $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $ip = $request->getClientIp();
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Compañía no encontrada');
            return redirect(route('com.clientes.index'));
        }
        $request->request->add(['updated_ip'=>$ip]);
        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $cliente = $this->clienteRepository->update($request->all(), $id);

        $cliente->direcciones()->forceDelete();
        $cliente->telefonos()->forceDelete();
        $cliente->contactosWeb()->forceDelete();
        //$cliente->direcciones->sync($direcciones);

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $cliente->id;
            $direccion['com_org_id'] = $cliente->com_org_id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $cliente->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $cliente->id;
            $telefono['com_org_id'] = $cliente->com_org_id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $cliente->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $cliente->id;
            $web['com_org_id'] = $cliente->com_org_id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $cliente->contactosWeb()->create($web);
        }

        Flash::success('Datos de la Compañía actualizados con éxito.');

        return redirect(route('com.clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Compañía no encontrada');

            return redirect(route('com.clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Datos de la Compañía eliminados con éxito.');

        return redirect(route('com.clientes.index'));
    }

    /**
     * Obtener la lista de Clientes dado un Rol. Mostrado en la selección de Rol, Cliente y Org.
     *
     * @return \Response
     */
    public function getListaClientesJson()
    {
        //\DB::enableQueryLog();
        $rolId = \Request::input('parent_id');

        $rol = Rol::where([
            ['id','=',$rolId],
            ['activo','=',1]
        ])->first();
        $listaClientes = LoginUtils::getClientesLectura($rol);
        ////$orgs = Rol::find($rolId)->organizaciones;
        //dd($orgs);
        ////$listaClientes = LoginUtils::getArrListaClientes($orgs);
        $clientes = Cliente::wherein('id',$listaClientes)->lists('nombre','id');
        //dd(\DB::getQueryLog());
        return Response::json($clientes);
    }

}