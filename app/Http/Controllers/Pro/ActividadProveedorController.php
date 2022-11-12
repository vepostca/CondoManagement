<?php

namespace InnovaCondomi\Http\Controllers\Pro;

use InnovaCondomi\DataTables\Pro\ActividadProveedorDataTable;
use InnovaCondomi\Http\Requests\Pro;
use InnovaCondomi\Http\Requests\Pro\CreateActividadProveedorRequest;
use InnovaCondomi\Http\Requests\Pro\UpdateActividadProveedorRequest;
use InnovaCondomi\Repositories\Pro\ActividadProveedorRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class ActividadProveedorController extends AppBaseController
{
    /** @var  ActividadProveedorRepository */
    private $actividadProveedorRepository;

    public function __construct(ActividadProveedorRepository $actividadProveedorRepo)
    {
        $this->actividadProveedorRepository = $actividadProveedorRepo;
    }

    /**
     * Mostrar el listado para el modelo ActividadProveedor.
     *
     * @param ActividadProveedorDataTable $actividadProveedorDataTable
     * @return Response
     */
    public function index(ActividadProveedorDataTable $actividadProveedorDataTable)
    {
        return $actividadProveedorDataTable->render('pro.actividadProveedors.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: ActividadProveedor.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('pro.actividadProveedors.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo ActividadProveedor recien creado
     *
     * @param CreateActividadProveedorRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadProveedorRequest $request)
    {
        $input = $request->all();
        $actividadProveedor = $this->actividadProveedorRepository->create($input);
        Flash::success('Datos de Actividad Proveedor grabados con éxito.');
        return redirect(route('pro.actividadProveedors.index'));
    }

    /**
     * Muestra el ActividadProveedor especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $actividadProveedor = $this->actividadProveedorRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($actividadProveedor)) {
            Flash::error('Actividad Proveedor No Encontrado');
            return redirect(route('pro.actividadProveedors.index'));
        }

        return view('pro.actividadProveedors.show')->with('actividadProveedor', $actividadProveedor);
    }

    /**
     * Muestra el formulario para editar el ActividadProveedor especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $actividadProveedor = $this->actividadProveedorRepository->findWithoutFail($id);

        if (empty($actividadProveedor)) {
            Flash::error('Actividad Proveedor No Encontrado');
            return redirect(route('pro.actividadProveedors.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('pro.actividadProveedors.edit')->with('actividadProveedor', $actividadProveedor)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el ActividadProveedor especificado.
     *
     * @param  int              $id
     * @param UpdateActividadProveedorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadProveedorRequest $request)
    {
        $actividadProveedor = $this->actividadProveedorRepository->findWithoutFail($id);

        if (empty($actividadProveedor)) {
            Flash::error('Actividad Proveedor No Encontrado');
            return redirect(route('pro.actividadProveedors.index'));
        }

        $actividadProveedor = $this->actividadProveedorRepository->update($request->all(), $id);
        Flash::success('Actividad Proveedor actualizado con éxito..');
        return redirect(route('pro.actividadProveedors.index'));
    }

    /**
     * Remove the specified ActividadProveedor from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $actividadProveedor = $this->actividadProveedorRepository->findWithoutFail($id);

        if (empty($actividadProveedor)) {
            Flash::error('Actividad Proveedor No Encontrado');
            return redirect(route('pro.actividadProveedors.index'));
        }

        $this->actividadProveedorRepository->delete($id);
        Flash::success('Datos de Actividad Proveedor eliminados con éxito.');
        return redirect(route('pro.actividadProveedors.index'));
    }
}
