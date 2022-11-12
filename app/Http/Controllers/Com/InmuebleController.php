<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\InmuebleDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateInmuebleRequest;
use InnovaCondomi\Http\Requests\Com\UpdateInmuebleRequest;
use InnovaCondomi\Repositories\Com\InmuebleRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\Division;
use InnovaCondomi\Entities\Com\TipoInmueble;

class InmuebleController extends AppBaseController
{
    /** @var  InmuebleRepository */
    private $inmuebleRepository;

    public function __construct(InmuebleRepository $inmuebleRepo)
    {
        //$this->middleware('auth');
        $this->inmuebleRepository = $inmuebleRepo;
    }

    /**
     * Display a listing of the Inmueble.
     *
     * @param InmuebleDataTable $inmuebleDataTable
     * @return Response
     */
    public function index(InmuebleDataTable $inmuebleDataTable)
    {
        return $inmuebleDataTable->render('com.inmuebles.index');
    }

    /**
     * Show the form for creating a new Inmueble.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $divisiones = Division::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoInmueble= TipoInmueble::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.inmuebles.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs)
            ->with('divisiones',$divisiones)
            ->with('tipoInmueble',$tipoInmueble);
    }

    /**
     * Store a newly created Inmueble in storage.
     *
     * @param CreateInmuebleRequest $request
     *
     * @return Response
     */
    public function store(CreateInmuebleRequest $request)
    {
        $input = $request->all();

        $inmueble = $this->inmuebleRepository->create($input);

        Flash::success('Datos del Inmueble grabados con éxito.');

        return redirect(route('com.inmuebles.index'));
    }

    /**
     * Display the specified Inmueble.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inmueble = $this->inmuebleRepository->with('cliente','org','division','tipoInmueble')->findWithoutFail($id);

        if (empty($inmueble)) {
            Flash::error('Inmueble No Encontrado.');

            return redirect(route('com.inmuebles.index'));
        }

        return view('com.inmuebles.show')->with('inmueble', $inmueble);
    }

    /**
     * Show the form for editing the specified Inmueble.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inmueble = $this->inmuebleRepository->findWithoutFail($id);

        if (empty($inmueble)) {
            Flash::error('Inmueble No Encontrado.');

            return redirect(route('com.inmuebles.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $divisiones = Division::orderBy('nombre','ASC')->lists('nombre','id');
        $tipoInmueble= TipoInmueble::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.inmuebles.edit')
            ->with('inmueble', $inmueble)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs)
            ->with('divisiones',$divisiones)
            ->with('tipoInmueble',$tipoInmueble);

    }

    /**
     * Update the specified Inmueble in storage.
     *
     * @param  int              $id
     * @param UpdateInmuebleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInmuebleRequest $request)
    {
        $inmueble = $this->inmuebleRepository->findWithoutFail($id);

        if (empty($inmueble)) {
            Flash::error('Inmueble No Encontrado');

            return redirect(route('com.inmuebles.index'));
        }
        //dd($request->all());
        $inmueble = $this->inmuebleRepository->update($request->all(), $id);

        Flash::success('Datos del Inmueble grabados con éxito.');

        return redirect(route('com.inmuebles.index'));
    }

    /**
     * Remove the specified Inmueble from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inmueble = $this->inmuebleRepository->findWithoutFail($id);

        if (empty($inmueble)) {
            Flash::error('Inmueble No Encontrado');

            return redirect(route('com.inmuebles.index'));
        }

        $this->inmuebleRepository->delete($id);

        Flash::success('Datos del Inmueble eliminados con éxito.');

        return redirect(route('com.inmuebles.index'));
    }
}
