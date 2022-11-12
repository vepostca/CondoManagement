<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\PropietarioDataTable;
use InnovaCondomi\Entities\Com\TipoPropietario;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreatePropietarioRequest;
use InnovaCondomi\Http\Requests\Com\UpdatePropietarioRequest;
use InnovaCondomi\Repositories\Com\PropietarioRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class PropietarioController extends AppBaseController
{
    /** @var  PropietarioRepository */
    private $propietarioRepository;

    public function __construct(PropietarioRepository $propietarioRepo)
    {
        $this->propietarioRepository = $propietarioRepo;
    }

    /**
     * Mostrar el listado para el modelo Propietario.
     *
     * @param PropietarioDataTable $propietarioDataTable
     * @return Response
     */
    public function index(PropietarioDataTable $propietarioDataTable)
    {
        return $propietarioDataTable->render('com.propietarios.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Propietario.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.propietarios.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo Propietario recien creado
     *
     * @param CreatePropietarioRequest $request
     *
     * @return Response
     */
    public function store(CreatePropietarioRequest $request)
    {
        $input = $request->all();
        $propietario = $this->propietarioRepository->create($input);
        Flash::success('Datos del Propietario grabados con éxito.');
        return redirect(route('com.propietarios.index'));
    }

    /**
     * Muestra el Propietario especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $propietario = $this->propietarioRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('Datos de Propietario No Encontrado');
            return redirect(route('com.propietarios.index'));
        }

        return view('com.propietarios.show')->with('propietario', $propietario);
    }

    /**
     * Muestra el formulario para editar el Propietario especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('Datos de Propietario No Encontrados.');
            return redirect(route('com.propietarios.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.propietarios.edit')->with('propietario', $propietario)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el Propietario especificado.
     *
     * @param  int              $id
     * @param UpdatePropietarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropietarioRequest $request)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('Datos de Propietario No Encontrado');
            return redirect(route('com.propietarios.index'));
        }

        $propietario = $this->propietarioRepository->update($request->all(), $id);
        Flash::success('Propietario actualizado con éxito..');
        return redirect(route('com.propietarios.index'));
    }

    /**
     * Remove the specified Propietario from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('Propietario No Encontrado');
            return redirect(route('com.propietarios.index'));
        }

        $this->propietarioRepository->delete($id);
        Flash::success('Datos de Propietario eliminados con éxito.');
        return redirect(route('com.propietarios.index'));
    }
}
