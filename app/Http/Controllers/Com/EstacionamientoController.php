<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\EstacionamientoDataTable;
use InnovaCondomi\Entities\Com\Inmueble;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateEstacionamientoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateEstacionamientoRequest;
use InnovaCondomi\Repositories\Com\EstacionamientoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class EstacionamientoController extends AppBaseController
{
    /** @var  EstacionamientoRepository */
    private $estacionamientoRepository;

    public function __construct(EstacionamientoRepository $estacionamientoRepo)
    {
        $this->estacionamientoRepository = $estacionamientoRepo;
    }

    /**
     * Mostrar el listado para el modelo Estacionamiento.
     *
     * @param EstacionamientoDataTable $estacionamientoDataTable
     * @return Response
     */
    public function index(EstacionamientoDataTable $estacionamientoDataTable)
    {
        return $estacionamientoDataTable->render('com.estacionamientos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Estacionamiento.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $inmuebles = Inmueble::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.estacionamientos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('inmuebles',$inmuebles);
    }

    /**
     * Almacenar el modelo Estacionamiento recien creado
     *
     * @param CreateEstacionamientoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstacionamientoRequest $request)
    {
        $input = $request->all();
        $estacionamiento = $this->estacionamientoRepository->create($input);
        Flash::success('Datos del Estacionamiento grabados con éxito.');
        return redirect(route('com.estacionamientos.index'));
    }

    /**
     * Muestra el Estacionamiento especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $estacionamiento = $this->estacionamientoRepository
            ->with('cliente','org','inmueble')->findWithoutFail($id);

        if (empty($estacionamiento)) {
            Flash::error('Datos del Estacionamiento No Encontrados.');
            return redirect(route('com.estacionamientos.index'));
        }

        return view('com.estacionamientos.show')->with('estacionamiento', $estacionamiento);
    }

    /**
     * Muestra el formulario para editar el Estacionamiento especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $estacionamiento = $this->estacionamientoRepository->findWithoutFail($id);

        if (empty($estacionamiento)) {
            Flash::error('Datos del Estacionamiento No Encontrados.');
            return redirect(route('com.estacionamientos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $inmuebles = Inmueble::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.estacionamientos.edit')->with('estacionamiento', $estacionamiento)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('inmuebles',$inmuebles);
    }

    /**
     * Actualizar el Estacionamiento especificado.
     *
     * @param  int              $id
     * @param UpdateEstacionamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstacionamientoRequest $request)
    {
        $estacionamiento = $this->estacionamientoRepository->findWithoutFail($id);

        if (empty($estacionamiento)) {
            Flash::error('Datos del Estacionamiento No Encontrados.');
            return redirect(route('com.estacionamientos.index'));
        }

        $estacionamiento = $this->estacionamientoRepository->update($request->all(), $id);
        Flash::success('Estacionamiento actualizado con éxito..');
        return redirect(route('com.estacionamientos.index'));
    }

    /**
     * Remove the specified Estacionamiento from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $estacionamiento = $this->estacionamientoRepository->findWithoutFail($id);

        if (empty($estacionamiento)) {
            Flash::error('Datos del Estacionamiento No Encontrados.');
            return redirect(route('com.estacionamientos.index'));
        }

        $this->estacionamientoRepository->delete($id);
        Flash::success('Datos del Estacionamiento eliminados con éxito.');
        return redirect(route('com.estacionamientos.index'));
    }
}
