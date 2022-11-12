<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\Clases\LoginUtils;
use InnovaCondomi\DataTables\Com\OrgDataTable;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\Region;
use InnovaCondomi\Entities\Seg\Rol;
use InnovaCondomi\Entities\Com\Pais;
use InnovaCondomi\Entities\Com\TipoContactoWeb;
use InnovaCondomi\Entities\Com\TipoDireccion;
use InnovaCondomi\Entities\Com\TipoTelefono;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateOrgRequest;
use InnovaCondomi\Http\Requests\Com\UpdateOrgRequest;
use InnovaCondomi\Repositories\Com\OrgInfoRepository;
use InnovaCondomi\Repositories\Com\OrgRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;

class OrgController extends AppBaseController
{
    /** @var  OrgRepository */
    private $orgRepository;
    private $orgInfoRepository;

    public function __construct(OrgRepository $orgRepo, OrgInfoRepository $orgInfoRepo)
    {
        //$this->middleware('auth');
        $this->orgRepository = $orgRepo;
        $this->orgInfoRepository = $orgInfoRepo;
    }

    /**
     * Display a listing of the Org.
     *
     * @param OrgDataTable $orgDataTable
     * @return Response
     */
    public function index(OrgDataTable $orgDataTable)
    {
        return $orgDataTable->render('com.orgs.index');
    }

    /**
     * Show the form for creating a new Org.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
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
        return view('com.orgs.create')
            ->with('clientes',$clientes)
            ->with('tipoDireccion',$tipoDireccion)
            ->with('paises',$paises)
            ->with('regiones',$regiones)
            ->with('tipoTelefono',$tipoTelefono)
            ->with('tipoContactoWeb',$tipoContactoWeb)
            ->with('nDirs',$nDirs)->with('nTelfs',$nTelfs)->with('nWebs',$nWebs)
            ->with('labelRegion',$labelRegion);
    }

    /**
     * Store a newly created Org in storage.
     *
     * @param CreateOrgRequest $request
     *
     * @return Response
     */
    public function store(CreateOrgRequest $request)
    {
        $ip = $request->getClientIp();
        $request->request->add(['borrado'=>false,
            'created_ip'=> $ip,
            'updated_ip'=>$ip]);

        $input = $request->all();

        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $org = $this->orgRepository->create($input);

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $org->com_cliente_id;
            $direccion['com_org_id'] = $org->id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $org->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $org->com_cliente_id;
            $telefono['com_org_id'] = $org->id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $org->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $org->com_cliente_id;
            $web['com_org_id'] = $org->id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $org->contactosWeb()->create($web);
        }

        Flash::success('Datos del Condominio grabados con éxito.');

        return redirect(route('com.orgs.index'));
    }

    /**
     * Display the specified Org.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $org = $this->orgRepository->with('cliente')->findWithoutFail($id);

        if (empty($org)) {
            Flash::error('Condominio no encontrado');
            return redirect(route('com.orgs.index'));
        }
        $parametros = $this->orgInfoRepository->with('moneda', 'tipoCalculoCuota')->findWithoutFail($id);
        //dd($parametros);
        return view('com.orgs.show')->with('org', $org)->with('parametros',$parametros);
    }

    /**
     * Show the form for editing the specified Org.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $org = $this->orgRepository->findWithoutFail($id);
        if (empty($org)) {
            Flash::error('Condominio no encontrado');

            return redirect(route('com.orgs.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $tipoDireccion = TipoDireccion::orderBy('nombre','ASC')->lists('nombre','id');
        $paises = Pais::orderBy('nombre','ASC')->lists('nombre','id')->prepend('Seleccione País','');
        $regiones = Region::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoTelefono = TipoTelefono::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoContactoWeb = TipoContactoWeb::orderBy('nombre','ASC')->lists('nombre','id');

        $dirs = $org->direcciones()->select('com_tipo_direccion_id','com_pais_id',
            'com_region_id','ciudad','linea_dir')->get();
        $nDirs = count($dirs);

        $telfs = $org->telefonos()->get();
        $nTelfs = count($telfs);

        $webs = $org->contactosWeb()->get();
        $nWebs = count($webs);

        $labelRegion = 'Región';

        return view('com.orgs.edit')
            ->with('org', $org)
            ->with('clientes',$clientes)
            ->with('tipoDireccion',$tipoDireccion)
            ->with('paises',$paises)
            ->with('regiones',$regiones)
            ->with('tipoTelefono',$tipoTelefono)
            ->with('tipoContactoWeb',$tipoContactoWeb)
            ->with('dirs',$dirs->toJson())->with('nDirs',$nDirs)
            ->with('telfs',$telfs->toJson())->with('nTelfs',$nTelfs)
            ->with('webs',$webs->toJson())->with('nWebs',$nWebs)
            ->with('labelRegion',$labelRegion);
    }

    /**
     * Update the specified Org in storage.
     *
     * @param  int              $id
     * @param UpdateOrgRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrgRequest $request)
    {
        $ip = $request->getClientIp();
        $org = $this->orgRepository->findWithoutFail($id);

        if (empty($org)) {
            Flash::error('Condominio no encontrado');

            return redirect(route('com.orgs.index'));
        }
        $request->request->add(['updated_ip'=>$ip]);
        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $org = $this->orgRepository->update($request->all(), $id);

        $org->direcciones()->forceDelete();
        $org->telefonos()->forceDelete();
        $org->contactosWeb()->forceDelete();

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $org->com_cliente_id;
            $direccion['com_org_id'] = $org->id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $org->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $org->com_cliente_id;
            $telefono['com_org_id'] = $org->id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $org->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $org->com_cliente_id;
            $web['com_org_id'] = $org->id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $org->contactosWeb()->create($web);
        }

        Flash::success('Condominio actualizado con éxito.');

        return redirect(route('com.orgs.index'));
    }

    /**
     * Remove the specified Org from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $org = $this->orgRepository->findWithoutFail($id);

        if (empty($org)) {
            Flash::error('Condominio no encontrado');

            return redirect(route('com.orgs.index'));
        }

        $this->orgRepository->delete($id);

        Flash::success('Datos del Condominio eliminados con éxito.');

        return redirect(route('com.orgs.index'));
    }

    /**
     * Obtener la lista de Orgs dado un Cliente. Mostrado en la selección de Rol, Cliente y Org.
     *
     * @return \Response
     */
    public function getListaOrgsJson()
    {
        //\DB::enableQueryLog();
        $rolId = \Request::input('rol');
        $clienteId = \Request::input('parent_id');
        $orgs = Rol::find($rolId)->organizaciones()
            ->where('seg_org_rol.com_cliente_id','=',$clienteId)->lists('com_org.nombre','com_org.id');
        return Response::json($orgs);
    }
}
