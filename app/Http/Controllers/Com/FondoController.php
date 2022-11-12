<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\FondoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateFondoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateFondoRequest;
use InnovaCondomi\Repositories\Com\FondoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class FondoController extends AppBaseController
{
    /** @var  FondoRepository */
    private $fondoRepository;

    public function __construct(FondoRepository $fondoRepo)
    {
        $this->fondoRepository = $fondoRepo;
    }

    /**
     * Mostrar el listado para el modelo Fondo.
     *
     * @param FondoDataTable $fondoDataTable
     * @return Response
     */
    public function index(FondoDataTable $fondoDataTable)
    {
        return $fondoDataTable->render('com.fondos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Fondo.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.fondos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo Fondo recien creado
     *
     * @param CreateFondoRequest $request
     *
     * @return Response
     */
    public function store(CreateFondoRequest $request)
    {
        $input = $request->all();
        $fondo = $this->fondoRepository->create($input);
        Flash::success('Datos del Fondo grabados con éxito.');
        return redirect(route('com.fondos.index'));
    }

    /**
     * Muestra el Fondo especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $fondo = $this->fondoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($fondo)) {
            Flash::error('Datos del Fondo No Encontrados.');
            return redirect(route('com.fondos.index'));
        }

        return view('com.fondos.show')->with('fondo', $fondo);
    }

    /**
     * Muestra el formulario para editar el Fondo especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $fondo = $this->fondoRepository->findWithoutFail($id);

        if (empty($fondo)) {
            Flash::error('Datos del Fondo No Encontrados.');
            return redirect(route('com.fondos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.fondos.edit')->with('fondo', $fondo)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el Fondo especificado.
     *
     * @param  int              $id
     * @param UpdateFondoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFondoRequest $request)
    {
        $fondo = $this->fondoRepository->findWithoutFail($id);

        if (empty($fondo)) {
            Flash::error('Datos del Fondo No Encontrados');
            return redirect(route('com.fondos.index'));
        }

        $fondo = $this->fondoRepository->update($request->all(), $id);
        Flash::success('Fondo actualizado con éxito..');
        return redirect(route('com.fondos.index'));
    }

    /**
     * Remove the specified Fondo from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $fondo = $this->fondoRepository->findWithoutFail($id);

        if (empty($fondo)) {
            Flash::error('Fondo No Encontrado');
            return redirect(route('com.fondos.index'));
        }

        $this->fondoRepository->delete($id);
        Flash::success('Datos del Fondo eliminados con éxito.');
        return redirect(route('com.fondos.index'));
    }
}
