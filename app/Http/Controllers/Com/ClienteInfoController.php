<?php

namespace InnovaCondomi\Http\Controllers\Com;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use InnovaCondomi\DataTables\Com\ClienteInfoDataTable;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Moneda;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\TipoCalculoCuota;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateClienteInfoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateClienteInfoRequest;
use InnovaCondomi\Repositories\Com\ClienteInfoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;

class ClienteInfoController extends AppBaseController
{
    /** @var  ClienteInfoRepository */
    private $clienteInfoRepository;

    public function __construct(ClienteInfoRepository $clienteInfoRepo)
    {
        //$this->middleware('auth');
        $this->clienteInfoRepository = $clienteInfoRepo;
    }

    /**
     * Display a listing of the ClienteInfo.
     *
     * @param ClienteInfoDataTable $clienteInfoDataTable
     * @return Response
     */
    public function index(ClienteInfoDataTable $clienteInfoDataTable)
    {
        return $clienteInfoDataTable->render('com.cliente_infos.index');
    }

    /**
     * Show the form for creating a new ClienteInfo.
     *
     * @return Response
     */
    public function create()
    {
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $monedas = Moneda::select('com_moneda.*',
            DB::raw("CONCAT(com_moneda.nombre, ' (', com_moneda.codigo_iso,' - ',com_moneda.simbolo,')')
                      as nombre_completo"))
            ->orderBy('nombre_completo')
            ->lists('nombre_completo','id');
        $tipoCalculoCuotas = TipoCalculoCuota::orderBy('nombre','ASC')->lists('nombre','id');
        $id = Request::input('id');
        $cliente = Cliente::find($id);
        return view('com.cliente_infos.create')
            ->with('orgs',$orgs)
            ->with('monedas',$monedas)
            ->with('tipoCalculoCuotas',$tipoCalculoCuotas)
            ->with('cliente',$cliente);
    }

    /**
     * Store a newly created ClienteInfo in storage.
     *
     * @param CreateClienteInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteInfoRequest $request)
    {
        $input = $request->all();

        $clienteInfo = $this->clienteInfoRepository->create($input);

        Flash::success('Cliente Info saved successfully.');

        return redirect(route('com.clienteInfos.index'));
    }

    /**
     * Display the specified ClienteInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clienteInfo = $this->clienteInfoRepository->findWithoutFail($id);

        if (empty($clienteInfo)) {
            Flash::error('Parámetros de la Compañía No Encontrados. Por favor ingrese los siguientes datos:');

            return redirect(route('com.clienteInfos.create',['id' => $id]));
        }
        $cliente = Cliente::find($id);
        return view('com.cliente_infos.show')->with('clienteInfo', $clienteInfo)->with('cliente',$cliente);
    }

    /**
     * Show the form for editing the specified ClienteInfo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clienteInfo = $this->clienteInfoRepository->findWithoutFail($id);

        if (empty($clienteInfo)) {
            Flash::error('Cliente Info not found');

            return redirect(route('com.clienteInfos.index'));
        }

        return view('com.cliente_infos.edit')->with('clienteInfo', $clienteInfo);
    }

    /**
     * Update the specified ClienteInfo in storage.
     *
     * @param  int              $id
     * @param UpdateClienteInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteInfoRequest $request)
    {
        $clienteInfo = $this->clienteInfoRepository->findWithoutFail($id);

        if (empty($clienteInfo)) {
            Flash::error('Cliente Info not found');

            return redirect(route('com.clienteInfos.index'));
        }

        $clienteInfo = $this->clienteInfoRepository->update($request->all(), $id);

        Flash::success('Cliente Info updated successfully.');

        return redirect(route('com.clienteInfos.index'));
    }

    /**
     * Remove the specified ClienteInfo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clienteInfo = $this->clienteInfoRepository->findWithoutFail($id);

        if (empty($clienteInfo)) {
            Flash::error('Cliente Info not found');

            return redirect(route('com.clienteInfos.index'));
        }

        $this->clienteInfoRepository->delete($id);

        Flash::success('Cliente Info deleted successfully.');

        return redirect(route('com.clienteInfos.index'));
    }
}
