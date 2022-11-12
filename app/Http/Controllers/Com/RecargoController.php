<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\RecargoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateRecargoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateRecargoRequest;
use InnovaCondomi\Repositories\Com\RecargoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class RecargoController extends AppBaseController
{
    /** @var  RecargoRepository */
    private $recargoRepository;

    public function __construct(RecargoRepository $recargoRepo)
    {
        $this->recargoRepository = $recargoRepo;
    }

    /**
     * Mostrar el listado para el modelo Recargo.
     *
     * @param RecargoDataTable $recargoDataTable
     * @return Response
     */
    public function index(RecargoDataTable $recargoDataTable)
    {
        return $recargoDataTable->render('com.recargos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Recargo.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.recargos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo Recargo recien creado
     *
     * @param CreateRecargoRequest $request
     *
     * @return Response
     */
    public function store(CreateRecargoRequest $request)
    {
        $input = $request->all();
        $recargo = $this->recargoRepository->create($input);
        Flash::success('Datos del Recargo grabados con éxito.');
        return redirect(route('com.recargos.index'));
    }

    /**
     * Muestra el Recargo especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $recargo = $this->recargoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($recargo)) {
            Flash::error('Datos del Recargo No Encontrados.');
            return redirect(route('com.recargos.index'));
        }
        return view('com.recargos.show')->with('recargo', $recargo);
    }

    /**
     * Muestra el formulario para editar el Recargo especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $recargo = $this->recargoRepository->findWithoutFail($id);

        if (empty($recargo)) {
            Flash::error('Datos del Recargo No Encontrados.');
            return redirect(route('com.recargos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.recargos.edit')->with('recargo', $recargo)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el Recargo especificado.
     *
     * @param  int              $id
     * @param UpdateRecargoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecargoRequest $request)
    {
        $recargo = $this->recargoRepository->findWithoutFail($id);

        if (empty($recargo)) {
            Flash::error('Datos del Recargo No Encontrados.');
            return redirect(route('com.recargos.index'));
        }

        $recargo = $this->recargoRepository->update($request->all(), $id);
        Flash::success('Datos del Recargo actualizado con éxito..');
        return redirect(route('com.recargos.index'));
    }

    /**
     * Remove the specified Recargo from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $recargo = $this->recargoRepository->findWithoutFail($id);

        if (empty($recargo)) {
            Flash::error('Datos del Recargo No Encontrados.');
            return redirect(route('com.recargos.index'));
        }

        $this->recargoRepository->delete($id);
        Flash::success('Datos del Recargo eliminados con éxito.');
        return redirect(route('com.recargos.index'));
    }
}
