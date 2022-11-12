<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\RegionDataTable;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\Pais;
use InnovaCondomi\Entities\Com\Region;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateRegionRequest;
use InnovaCondomi\Http\Requests\Com\UpdateRegionRequest;
use InnovaCondomi\Repositories\Com\RegionRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;

class RegionController extends AppBaseController
{
    /** @var  RegionRepository */
    private $regionRepository;

    public function __construct(RegionRepository $regionRepo)
    {
        //$this->middleware('auth');
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the Region.
     *
     * @param RegionDataTable $regionDataTable
     * @return Response
     */
    public function index(RegionDataTable $regionDataTable)
    {
        return $regionDataTable->render('com.regions.index');
    }

    /**
     * Show the form for creating a new Region.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        $paises   = Pais::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.regions.create')
                ->with('clientes', $clientes)
                ->with('orgs',$orgs)
                ->with('paises',$paises);
    }

    /**
     * Store a newly created Region in storage.
     *
     * @param CreateRegionRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionRequest $request)
    {
        $input = $request->all();

        $region = $this->regionRepository->create($input);

        Flash::success('Datos de Región grabados con éxito.');

        return redirect(route('com.regions.index'));
    }

    /**
     * Display the specified Region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$region = $this->regionRepository->findWithoutFail($id);
        $region = Region::select('com_region.*', 'com_cliente.nombre as nombre_cliente',
                                 'com_org.nombre as nombre_org', 'com_pais.nombre as nombre_pais')
            ->where('com_region.id',$id)
            ->join('com_pais', 'com_pais.id', '=', 'com_region.com_pais_id')
            ->join('com_org', 'com_org.id', '=', 'com_region.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_region.com_cliente_id')
            ->first();

        if (empty($region)) {
            Flash::error('Región No Encontrada');

            return redirect(route('com.regions.index'));
        }

        return view('com.regions.show')->with('region', $region);
    }

    /**
     * Show the form for editing the specified Region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Región No Encontrada');

            return redirect(route('com.regions.index'));
        }

        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        $paises   = Pais::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.regions.edit')
            ->with('region', $region)
            ->with('clientes', $clientes)
            ->with('orgs',$orgs)
            ->with('paises',$paises);
    }

    /**
     * Update the specified Region in storage.
     *
     * @param  int              $id
     * @param UpdateRegionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionRequest $request)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Región No Encontrada');

            return redirect(route('com.regions.index'));
        }

        $region = $this->regionRepository->update($request->all(), $id);

        Flash::success('Datos de la Región actualizados con éxito.');

        return redirect(route('com.regions.index'));
    }

    /**
     * Remove the specified Region from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Región No Encontrada');

            return redirect(route('com.regions.index'));
        }

        $this->regionRepository->delete($id);

        Flash::success('Datos de la Región Eliminados con éxito.');

        return redirect(route('com.regions.index'));
    }

    /**
     * Obtener la lista de Clientes dado un Rol. Mostrado en la selección de Rol, Cliente y Org.
     *
     * @return \Response
     */
    public function getListaRegionesJson()
    {
        //\DB::enableQueryLog();
        $paisId = \Request::input('parent_id');
        $regiones = Region::where('com_pais_id','=',$paisId)->lists('nombre','id');
        //dd(Response::json($regiones));
        //dd(\DB::getQueryLog());
        return Response::json($regiones);
    }
}
