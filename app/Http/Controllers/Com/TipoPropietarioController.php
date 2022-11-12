<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoPropietarioDataTable;
use InnovaCondomi\Entities\Com\TipoPropietario;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoPropietarioRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoPropietarioRequest;
use InnovaCondomi\Repositories\Com\TipoPropietarioRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoPropietarioController extends AppBaseController
{
    /** @var  TipoPropietarioRepository */
    private $tipoPropietarioRepository;

    public function __construct(TipoPropietarioRepository $tipoPropietarioRepo)
    {
        //$this->middleware('auth');
        $this->tipoPropietarioRepository = $tipoPropietarioRepo;
    }

    /**
     * Display a listing of the TipoPropietario.
     *
     * @param TipoPropietarioDataTable $tipoPropietarioDataTable
     * @return Response
     */
    public function index(TipoPropietarioDataTable $tipoPropietarioDataTable)
    {
        return $tipoPropietarioDataTable->render('com.tipo_propietarios.index');
    }

    /**
     * Show the form for creating a new TipoPropietario.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_propietarios.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoPropietario in storage.
     *
     * @param CreateTipoPropietarioRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoPropietarioRequest $request)
    {
        $input = $request->all();

        $tipoPropietario = $this->tipoPropietarioRepository->create($input);

        Flash::success('Datos del Tipo de Propietario grabados con éxito.');

        return redirect(route('com.tipoPropietarios.index'));
    }

    /**
     * Display the specified TipoPropietario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPropietario = $this->tipoPropietarioRepository->with('cliente','org')->findWithoutFail($id);

        if (empty($tipoPropietario)) {
            Flash::error('Tipo de Propietario No Encontrado.');

            return redirect(route('com.tipoPropietarios.index'));
        }

        return view('com.tipo_propietarios.show')->with('tipoPropietario', $tipoPropietario);
    }

    /**
     * Show the form for editing the specified TipoPropietario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPropietario = $this->tipoPropietarioRepository->findWithoutFail($id);

        if (empty($tipoPropietario)) {
            Flash::error('Tipo de Propietario No Encontrado.');

            return redirect(route('com.tipoPropietarios.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_propietarios.edit')
            ->with('tipoPropietario', $tipoPropietario)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoPropietario in storage.
     *
     * @param  int              $id
     * @param UpdateTipoPropietarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoPropietarioRequest $request)
    {
        $tipoPropietario = $this->tipoPropietarioRepository->findWithoutFail($id);

        if (empty($tipoPropietario)) {
            Flash::error('Tipo de Propietario No Encontrado');

            return redirect(route('com.tipoPropietarios.index'));
        }

        $tipoPropietario = $this->tipoPropietarioRepository->update($request->all(), $id);

        Flash::success('Datos del Tipo de Propietario actualizados con éxito.');

        return redirect(route('com.tipoPropietarios.index'));
    }

    /**
     * Remove the specified TipoPropietario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPropietario = $this->tipoPropietarioRepository->findWithoutFail($id);

        if (empty($tipoPropietario)) {
            Flash::error('Tipo de Propietario No Encontrado');

            return redirect(route('com.tipoPropietarios.index'));
        }

        $this->tipoPropietarioRepository->delete($id);

        Flash::success('Datos del Tipo de Propietario eliminados con éxito.');

        return redirect(route('com.tipoPropietarios.index'));
    }
}
