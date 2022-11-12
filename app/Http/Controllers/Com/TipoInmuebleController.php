<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoInmuebleDataTable;
use InnovaCondomi\Entities\Com\TipoInmueble;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoInmuebleRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoInmuebleRequest;
use InnovaCondomi\Repositories\Com\TipoInmuebleRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoInmuebleController extends AppBaseController
{
    /** @var  TipoInmuebleRepository */
    private $tipoInmuebleRepository;

    public function __construct(TipoInmuebleRepository $tipoInmuebleRepo)
    {
        //$this->middleware('auth');
        $this->tipoInmuebleRepository = $tipoInmuebleRepo;
    }

    /**
     * Display a listing of the TipoInmueble.
     *
     * @param TipoInmuebleDataTable $tipoInmuebleDataTable
     * @return Response
     */
    public function index(TipoInmuebleDataTable $tipoInmuebleDataTable)
    {
        return $tipoInmuebleDataTable->render('com.tipo_inmuebles.index');
    }

    /**
     * Show the form for creating a new TipoInmueble.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_inmuebles.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoInmueble in storage.
     *
     * @param CreateTipoInmuebleRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoInmuebleRequest $request)
    {
        $input = $request->all();

        $tipoInmueble = $this->tipoInmuebleRepository->create($input);

        Flash::success('Datos del Tipo de Inmueble grabados con éxito.');

        return redirect(route('com.tipoInmuebles.index'));
    }

    /**
     * Display the specified TipoInmueble.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoInmueble = $this->tipoInmuebleRepository->with('cliente','org')->findWithoutFail($id);

        if (empty($tipoInmueble)) {
            Flash::error('Tipo de Inmueble No Encontrado.');

            return redirect(route('com.tipoInmuebles.index'));
        }

        return view('com.tipo_inmuebles.show')->with('tipoInmueble', $tipoInmueble);
    }

    /**
     * Show the form for editing the specified TipoInmueble.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoInmueble = $this->tipoInmuebleRepository->findWithoutFail($id);

        if (empty($tipoInmueble)) {
            Flash::error('Tipo de Inmueble No Encontrado.');

            return redirect(route('com.tipoInmuebles.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_inmuebles.edit')
            ->with('tipoInmueble', $tipoInmueble)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoInmueble in storage.
     *
     * @param  int              $id
     * @param UpdateTipoInmuebleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoInmuebleRequest $request)
    {
        $tipoInmueble = $this->tipoInmuebleRepository->findWithoutFail($id);

        if (empty($tipoInmueble)) {
            Flash::error('Tipo de Inmueble No Encontrado');

            return redirect(route('com.tipoInmuebles.index'));
        }

        $tipoInmueble = $this->tipoInmuebleRepository->update($request->all(), $id);

        Flash::success('Datos del Tipo de Inmueble actualizados con éxito.');

        return redirect(route('com.tipoInmuebles.index'));
    }

    /**
     * Remove the specified TipoInmueble from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoInmueble = $this->tipoInmuebleRepository->findWithoutFail($id);

        if (empty($tipoInmueble)) {
            Flash::error('Tipo de Inmueble No Encontrado.');

            return redirect(route('com.tipoInmuebles.index'));
        }

        $this->tipoInmuebleRepository->delete($id);

        Flash::success('Datos del Tipo de Inmueble eliminados con éxito.');

        return redirect(route('com.tipoInmuebles.index'));
    }
}
