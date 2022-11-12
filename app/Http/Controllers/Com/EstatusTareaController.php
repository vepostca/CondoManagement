<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\EstatusTareaDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateEstatusTareaRequest;
use InnovaCondomi\Http\Requests\Com\UpdateEstatusTareaRequest;
use InnovaCondomi\Repositories\Com\EstatusTareaRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class EstatusTareaController extends AppBaseController
{
    /** @var  EstatusTareaRepository */
    private $estatusTareaRepository;

    public function __construct(EstatusTareaRepository $estatusTareaRepo)
    {
        $this->estatusTareaRepository = $estatusTareaRepo;
    }

    /**
     * Mostrar el listado para el modelo EstatusTarea.
     *
     * @param EstatusTareaDataTable $estatusTareaDataTable
     * @return Response
     */
    public function index(EstatusTareaDataTable $estatusTareaDataTable)
    {
        return $estatusTareaDataTable->render('com.estatusTareas.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: EstatusTarea.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.estatusTareas.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo EstatusTarea recien creado
     *
     * @param CreateEstatusTareaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstatusTareaRequest $request)
    {
        $input = $request->all();
        $estatusTarea = $this->estatusTareaRepository->create($input);
        Flash::success('Datos del Estatus Tarea grabados con éxito.');
        return redirect(route('com.estatusTareas.index'));
    }

    /**
     * Muestra el EstatusTarea especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $estatusTarea = $this->estatusTareaRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($estatusTarea)) {
            Flash::error('Estatus Tarea No Encontrado');
            return redirect(route('com.estatusTareas.index'));
        }

        return view('com.estatusTareas.show')->with('estatusTarea', $estatusTarea);
    }

    /**
     * Muestra el formulario para editar el EstatusTarea especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $estatusTarea = $this->estatusTareaRepository->findWithoutFail($id);

        if (empty($estatusTarea)) {
            Flash::error('Estatus Tarea No Encontrado');
            return redirect(route('com.estatusTareas.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.estatusTareas.edit')->with('estatusTarea', $estatusTarea)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el EstatusTarea especificado.
     *
     * @param  int              $id
     * @param UpdateEstatusTareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstatusTareaRequest $request)
    {
        $estatusTarea = $this->estatusTareaRepository->findWithoutFail($id);

        if (empty($estatusTarea)) {
            Flash::error('Estatus Tarea No Encontrado');
            return redirect(route('com.estatusTareas.index'));
        }

        $estatusTarea = $this->estatusTareaRepository->update($request->all(), $id);
        Flash::success('Datos del Estatus Tarea actualizado con éxito..');
        return redirect(route('com.estatusTareas.index'));
    }

    /**
     * Remove the specified EstatusTarea from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $estatusTarea = $this->estatusTareaRepository->findWithoutFail($id);

        if (empty($estatusTarea)) {
            Flash::error('Estatus Tarea No Encontrado');
            return redirect(route('com.estatusTareas.index'));
        }

        $this->estatusTareaRepository->delete($id);
        Flash::success('Datos del EstatusTarea eliminados con éxito.');
        return redirect(route('com.estatusTareas.index'));
    }
}
