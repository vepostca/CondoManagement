<?php

namespace InnovaCondomi\Http\Controllers\Com;

use Illuminate\Support\Facades\Route;
use InnovaCondomi\DataTables\Com\OrgInfoDataTable;
use InnovaCondomi\Entities\Com\ClienteInfo;
use InnovaCondomi\Entities\Com\Moneda;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\OrgInfo;
use InnovaCondomi\Entities\Com\TipoCalculoCuota;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateOrgInfoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateOrgInfoRequest;
use InnovaCondomi\Repositories\Com\OrgInfoRepository;
use Flash;
use DB;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use Illuminate\Support\Facades\Request;

class OrgInfoController extends AppBaseController
{
    /** @var  OrgInfoRepository */
    private $orgInfoRepository;

    public function __construct(OrgInfoRepository $orgInfoRepo)
    {
        //$this->middleware('auth');
        $this->orgInfoRepository = $orgInfoRepo;
    }

    /**
     * Display a listing of the OrgInfo.
     *
     * @param OrgInfoDataTable $orgInfoDataTable
     * @return Response
     */
    public function index(OrgInfoDataTable $orgInfoDataTable)
    {
        return $orgInfoDataTable->render('com.org_infos.index');
    }

    /**
     * Show the form for creating a new OrgInfo.
     *
     * @return Response
     */
    public function create()
    {
        //dd(Route::getFacadeRoot()->current()->uri());
        $clientes = Cliente::logueado()->lists('nombre','id');
        $monedas = Moneda::select('com_moneda.*',
            DB::raw("CONCAT(com_moneda.nombre, ' (', com_moneda.codigo_iso,' - ',com_moneda.simbolo,')')
                      as nombre_completo"))
            ->orderBy('nombre_completo')
            ->lists('nombre_completo','id');
        $tipoCalculoCuotas = TipoCalculoCuota::orderBy('nombre','ASC')->lists('nombre','id');
        $id = Request::input('id');
        $org = Org::find($id);
        if (!empty($org)){
            $clienteInfo = ClienteInfo::find($org->com_cliente_id);
        }
        return view('com.org_infos.create')
            ->with('clientes',$clientes)
            ->with('monedas',$monedas)
            ->with('tipoCalculoCuotas',$tipoCalculoCuotas)
            ->with('org',$org);
    }

    /**
     * Store a newly created OrgInfo in storage.
     *
     * @param CreateOrgInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrgInfoRequest $request)
    {
        $input = $request->all();
        $orgInfo = $this->orgInfoRepository->create($input);

        Flash::success('Parámetros del Condominio grabados con éxito.');

        return redirect(route('com.orgInfos.show',$orgInfo->id));
    }

    /**
     * Display the specified OrgInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orgInfo = $this->orgInfoRepository->with('cliente','moneda','tipoCalculoCuota')->findWithoutFail($id);

        if (empty($orgInfo)) {
            Flash::error('Parámetros del Condominio No Encontrados. Por favor ingrese los siguientes datos:');

            return redirect(route('com.orgInfos.create',['id' => $id]));
        }
        $org = Org::find($id);
        return view('com.org_infos.show')->with('orgInfo', $orgInfo)->with('org',$org);
    }

    /**
     * Show the form for editing the specified OrgInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orgInfo = $this->orgInfoRepository->findWithoutFail($id);

        if (empty($orgInfo)) {
            Flash::error('Parámetros del Condominio No Encontrados.');

            return redirect(route('com.orgs.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $monedas = Moneda::select('com_moneda.*',
            DB::raw("CONCAT(com_moneda.nombre, ' (', com_moneda.codigo_iso,' - ',com_moneda.simbolo,')')
                      as nombre_completo"))
            ->orderBy('nombre_completo')
            ->lists('nombre_completo','id');
        $tipoCalculoCuotas = TipoCalculoCuota::orderBy('nombre','ASC')->lists('nombre','id');

        $org = Org::find($id);
        return view('com.org_infos.edit')->with('orgInfo', $orgInfo)
            ->with('clientes',$clientes)
            ->with('monedas',$monedas)
            ->with('tipoCalculoCuotas',$tipoCalculoCuotas)
            ->with('org',$org);
    }

    /**
     * Update the specified OrgInfo in storage.
     *
     * @param  int              $id
     * @param UpdateOrgInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrgInfoRequest $request)
    {
        $orgInfo = $this->orgInfoRepository->findWithoutFail($id);

        if (empty($orgInfo)) {
            Flash::error('Parámetros del Condominio No Encontrados.');

            return redirect(route('com.orgs.index'));
        }

        $orgInfo = $this->orgInfoRepository->update($request->all(), $id);

        Flash::success('Parámetros del Condominio Actualizados con éxito.');

        return redirect(route('com.orgInfos.show', $id));
    }

    /**
     * Remove the specified OrgInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //$orgInfo = $this->orgInfoRepository->findWithoutFail($id);
        $orgInfo = OrgInfo::find($id);
        if (empty($orgInfo)) {
            Flash::error('Parámetros del Condominio No Encontrados.');
            return redirect(route('com.orgs.index'));
        }
        //$this->orgInfoRepository->delete($id);
        $orgInfo->forceDelete();
        Flash::success('Parámetros del Condominio Eliminados con éxito.');

        return redirect(route('com.orgs.index'));
    }
}
