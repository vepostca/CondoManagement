<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\MonedaDataTable;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Moneda;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateMonedaRequest;
use InnovaCondomi\Http\Requests\Com\UpdateMonedaRequest;
use InnovaCondomi\Repositories\Com\MonedaRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;

class MonedaController extends AppBaseController
{
    /** @var  MonedaRepository */
    private $monedaRepository;

    public function __construct(MonedaRepository $monedaRepo)
    {
        //$this->middleware('auth');
        $this->monedaRepository = $monedaRepo;
    }

    /**
     * Display a listing of the Moneda.
     *
     * @param MonedaDataTable $monedaDataTable
     * @return Response
     */
    public function index(MonedaDataTable $monedaDataTable)
    {
        return $monedaDataTable->render('com.monedas.index');
    }

    /**
     * Show the form for creating a new Moneda.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.monedas.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created Moneda in storage.
     *
     * @param CreateMonedaRequest $request
     *
     * @return Response
     */
    public function store(CreateMonedaRequest $request)
    {
        $input = $request->all();

        $moneda = $this->monedaRepository->create($input);

        Flash::success('Datos de Monedas grabados con éxito.');

        return redirect(route('com.monedas.index'));
    }

    /**
     * Display the specified Moneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $moneda = $this->monedaRepository->with('cliente','org')->findWithoutFail($id);

        if (empty($moneda)) {
            Flash::error('Moneda No Encontrada');

            return redirect(route('com.monedas.index'));
        }

        return view('com.monedas.show')->with('moneda', $moneda);
    }

    /**
     * Show the form for editing the specified Moneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            Flash::error('Moneda No Encontrada');

            return redirect(route('com.monedas.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.monedas.edit')
            ->with('moneda', $moneda)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified Moneda in storage.
     *
     * @param  int              $id
     * @param UpdateMonedaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonedaRequest $request)
    {
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            Flash::error('Moneda No Encontrada');

            return redirect(route('com.monedas.index'));
        }

        $moneda = $this->monedaRepository->update($request->all(), $id);

        Flash::success('Datos de Moneda actualizados con éxito.');

        return redirect(route('com.monedas.index'));
    }

    /**
     * Remove the specified Moneda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $moneda = $this->monedaRepository->findWithoutFail($id);

        if (empty($moneda)) {
            Flash::error('Moneda No Encontrada');

            return redirect(route('com.monedas.index'));
        }

        $this->monedaRepository->delete($id);

        Flash::success('Datos de Moneda eliminados con éxito.');

        return redirect(route('com.monedas.index'));
    }
}
