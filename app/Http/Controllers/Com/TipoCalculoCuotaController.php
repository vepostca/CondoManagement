<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoCalculoCuotaDataTable;
use InnovaCondomi\Entities\Com\TipoCalculoCuota;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoCalculoCuotaRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoCalculoCuotaRequest;
use InnovaCondomi\Repositories\Com\TipoCalculoCuotaRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoCalculoCuotaController extends AppBaseController
{
    /** @var  TipoCalculoCuotaRepository */
    private $tipoCalculoCuotaRepository;

    public function __construct(TipoCalculoCuotaRepository $tipoCalculoCuotaRepo)
    {
        //$this->middleware('auth');
        $this->tipoCalculoCuotaRepository = $tipoCalculoCuotaRepo;
    }

    /**
     * Display a listing of the TipoCalculoCuota.
     *
     * @param TipoCalculoCuotaDataTable $tipoCalculoCuotaDataTable
     * @return Response
     */
    public function index(TipoCalculoCuotaDataTable $tipoCalculoCuotaDataTable)
    {
        return $tipoCalculoCuotaDataTable->render('com.tipo_calculo_cuotas.index');
    }

    /**
     * Show the form for creating a new TipoCalculoCuota.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_calculo_cuotas.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoCalculoCuota in storage.
     *
     * @param CreateTipoCalculoCuotaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoCalculoCuotaRequest $request)
    {
        $input = $request->all();

        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->create($input);

        Flash::success('Datos del Tipo Cálculo Cuota grabados con éxito.');

        return redirect(route('com.tipoCalculoCuotas.index'));
    }

    /**
     * Display the specified TipoCalculoCuota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->with('cliente','org')->findWithoutFail($id);

        if (empty($tipoCalculoCuota)) {
            Flash::error('Tipo Cálculo Cuota No Encontrado');

            return redirect(route('com.tipoCalculoCuotas.index'));
        }

        return view('com.tipo_calculo_cuotas.show')->with('tipoCalculoCuota', $tipoCalculoCuota);
    }

    /**
     * Show the form for editing the specified TipoCalculoCuota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->findWithoutFail($id);

        if (empty($tipoCalculoCuota)) {
            Flash::error('Tipo Cálculo Cuota No Encontrado');

            return redirect(route('com.tipoCalculoCuotas.index'));
        }

        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_calculo_cuotas.edit')
            ->with('tipoCalculoCuota', $tipoCalculoCuota)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoCalculoCuota in storage.
     *
     * @param  int              $id
     * @param UpdateTipoCalculoCuotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoCalculoCuotaRequest $request)
    {
        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->findWithoutFail($id);

        if (empty($tipoCalculoCuota)) {
            Flash::error('Tipo Cálculo Cuota No Encontrado');

            return redirect(route('com.tipoCalculoCuotas.index'));
        }

        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->update($request->all(), $id);

        Flash::success('Datos del Tipo Cálculo Cuota actualizados con éxito.');

        return redirect(route('com.tipoCalculoCuotas.index'));
    }

    /**
     * Remove the specified TipoCalculoCuota from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoCalculoCuota = $this->tipoCalculoCuotaRepository->findWithoutFail($id);

        if (empty($tipoCalculoCuota)) {
            Flash::error('Tipo Cálculo Cuota No Encontrado');

            return redirect(route('com.tipoCalculoCuotas.index'));
        }

        $this->tipoCalculoCuotaRepository->delete($id);

        Flash::success('Datos del Tipo Cálculo Cuota eliminados con éxito.');

        return redirect(route('com.tipoCalculoCuotas.index'));
    }
}
