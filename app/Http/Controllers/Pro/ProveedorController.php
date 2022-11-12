<?php

namespace InnovaCondomi\Http\Controllers\Pro;

use InnovaCondomi\DataTables\Pro\ProveedorDataTable;
use InnovaCondomi\Entities\Com\Pais;
use InnovaCondomi\Entities\Com\Region;
use InnovaCondomi\Entities\Com\TipoContactoWeb;
use InnovaCondomi\Entities\Com\TipoDireccion;
use InnovaCondomi\Entities\Com\TipoTelefono;
use InnovaCondomi\Entities\Pro\ActividadProveedor;
use InnovaCondomi\Http\Requests\Pro;
use InnovaCondomi\Http\Requests\Pro\CreateProveedorRequest;
use InnovaCondomi\Http\Requests\Pro\UpdateProveedorRequest;
use InnovaCondomi\Repositories\Pro\ProveedorRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class ProveedorController extends AppBaseController
{
    /** @var  ProveedorRepository */
    private $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepo)
    {
        $this->proveedorRepository = $proveedorRepo;
    }

    /**
     * Mostrar el listado para el modelo Proveedor.
     *
     * @param ProveedorDataTable $proveedorDataTable
     * @return Response
     */
    public function index(ProveedorDataTable $proveedorDataTable)
    {
        return $proveedorDataTable->render('pro.proveedors.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Proveedor.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $actividadesProveedor = ActividadProveedor::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
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

        return view('pro.proveedors.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('actividadesProveedor',$actividadesProveedor)
                    ->with('tipoDireccion',$tipoDireccion)
                    ->with('paises',$paises)
                    ->with('regiones',$regiones)
                    ->with('tipoTelefono',$tipoTelefono)
                    ->with('tipoContactoWeb',$tipoContactoWeb)
                    ->with('nDirs',$nDirs)->with('nTelfs',$nTelfs)->with('nWebs',$nWebs)
                    ->with('labelRegion',$labelRegion);
    }

    /**
     * Almacenar el modelo Proveedor recien creado
     *
     * @param CreateProveedorRequest $request
     *
     * @return Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $ip = $request->getClientIp();
        $request->request->add(['borrado'=>false,
            'created_ip'=> $ip,
            'updated_ip'=>$ip]);

        $input = $request->all();
        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $proveedor = $this->proveedorRepository->create($input);

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $proveedor->com_cliente_id;
            $direccion['com_org_id'] = $proveedor->com_org_id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $proveedor->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $proveedor->com_cliente_id;
            $telefono['com_org_id'] = $proveedor->com_org_id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $proveedor->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $proveedor->com_cliente_id;
            $web['com_org_id'] = $proveedor->com_org_id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $proveedor->contactosWeb()->create($web);
        }

        Flash::success('Datos del Proveedor grabados con éxito.');
        return redirect(route('pro.proveedors.index'));
    }

    /**
     * Muestra el Proveedor especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $proveedor = $this->proveedorRepository
            ->with('cliente','org','actividadProveedor')->findWithoutFail($id);

        if (empty($proveedor)) {
            Flash::error('Datos del Proveedor No Encontrado');
            return redirect(route('pro.proveedors.index'));
        }

        return view('pro.proveedors.show')->with('proveedor', $proveedor);
    }

    /**
     * Muestra el formulario para editar el Proveedor especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $proveedor = $this->proveedorRepository->findWithoutFail($id);

        if (empty($proveedor)) {
            Flash::error('Datos de Proveedor No Encontrados.');
            return redirect(route('pro.proveedors.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $actividadesProveedor = ActividadProveedor::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');

        $tipoDireccion = TipoDireccion::orderBy('nombre','ASC')->lists('nombre','id');
        $paises = Pais::orderBy('nombre','ASC')->lists('nombre','id')->prepend('Seleccione País','');
        $regiones = Region::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoTelefono = TipoTelefono::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoContactoWeb = TipoContactoWeb::orderBy('nombre','ASC')->lists('nombre','id');
        $dirs = $proveedor->direcciones()->select('com_tipo_direccion_id','com_pais_id',
            'com_region_id','ciudad','linea_dir')->get();
        $nDirs = count($dirs);

        $telfs = $proveedor->telefonos()->get();
        $nTelfs = count($telfs);

        $webs = $proveedor->contactosWeb()->select('com_tipo_contacto_web_id','valor','es_principal','notas')
            ->get();
        $nWebs = count($webs);

        $labelRegion = 'Región';
        return view('pro.proveedors.edit')->with('proveedor', $proveedor)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('actividadesProveedor',$actividadesProveedor)
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
     * Actualizar el Proveedor especificado.
     *
     * @param  int              $id
     * @param UpdateProveedorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProveedorRequest $request)
    {
        $ip = $request->ip();
        $proveedor = $this->proveedorRepository->findWithoutFail($id);

        if (empty($proveedor)) {
            Flash::error('Datos del Proveedor No Encontrados.');
            return redirect(route('pro.proveedors.index'));
        }

        $request->request->add(['updated_ip'=>$ip]);
        $direcciones = $request->input('direcciones');
        $telefonos = $request->input('telefonos');
        $contacto_web = $request->input('contacto_web');

        $proveedor = $this->proveedorRepository->update($request->all(), $id);

        $proveedor->direcciones()->forceDelete();
        $proveedor->telefonos()->forceDelete();
        $proveedor->contactosWeb()->forceDelete();

        foreach($direcciones as $direccion) {
            $direccion['com_cliente_id'] = $proveedor->com_cliente_id;
            $direccion['com_org_id'] = $proveedor->com_org_id;
            $direccion['activo'] = true;
            $direccion['borrado'] = false;
            $direccion['created_ip'] = $ip;
            $direccion['updated_ip'] = $ip;
            $proveedor->direcciones()->create($direccion);
        }
        foreach ($telefonos as $telefono){
            $telefono['com_cliente_id'] = $proveedor->com_cliente_id;
            $telefono['com_org_id'] = $proveedor->com_org_id;
            $telefono['activo'] = true;
            $telefono['borrado'] = false;
            $telefono['created_ip'] = $ip;
            $telefono['updated_ip'] = $ip;
            $proveedor->telefonos()->create($telefono);
        }
        foreach ($contacto_web as $web){
            $web['com_cliente_id'] = $proveedor->com_cliente_id;
            $web['com_org_id'] = $proveedor->com_org_id;
            $web['activo'] = true;
            $web['borrado'] = false;
            $web['created_ip'] = $ip;
            $web['updated_ip'] = $ip;
            $proveedor->contactosWeb()->create($web);
        }

        Flash::success('Datos del Proveedor actualizados con éxito.');
        return redirect(route('pro.proveedors.index'));
    }

    /**
     * Remove the specified Proveedor from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $proveedor = $this->proveedorRepository->findWithoutFail($id);

        if (empty($proveedor)) {
            Flash::error('Proveedor No Encontrado');
            return redirect(route('pro.proveedors.index'));
        }

        $this->proveedorRepository->delete($id);
        Flash::success('Datos del Proveedor eliminados con éxito.');
        return redirect(route('pro.proveedors.index'));
    }
}
