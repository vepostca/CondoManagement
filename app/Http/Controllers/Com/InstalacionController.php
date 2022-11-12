<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\InstalacionDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateInstalacionRequest;
use InnovaCondomi\Http\Requests\Com\UpdateInstalacionRequest;
use InnovaCondomi\Repositories\Com\InstalacionRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\Fondo;

class InstalacionController extends AppBaseController
{
    /** @var  InstalacionRepository */
    private $instalacionRepository;

    public function __construct(InstalacionRepository $instalacionRepo)
    {
        $this->instalacionRepository = $instalacionRepo;
    }

    /**
     * Mostrar el listado para el modelo Instalacion.
     *
     * @param InstalacionDataTable $instalacionDataTable
     * @return Response
     */
    public function index(InstalacionDataTable $instalacionDataTable)
    {
        return $instalacionDataTable->render('com.instalacions.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Instalacion.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $fondos = Fondo::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.instalacions.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('fondos',$fondos);
    }

    /**
     * Almacenar el modelo Instalacion recien creado
     *
     * @param CreateInstalacionRequest $request
     *
     * @return Response
     */
    public function store(CreateInstalacionRequest $request)
    {
        $input = $request->all();
        $instalacion = $this->instalacionRepository->create($input);
        Flash::success('Datos de la Instalación grabados con éxito.');
        return redirect(route('com.instalacions.index'));
    }

    /**
     * Muestra el Instalacion especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $instalacion = $this->instalacionRepository
            ->with('cliente','org','fondo')->findWithoutFail($id);

        if (empty($instalacion)) {
            Flash::error('Datos de la Instalación No Encontrados.');
            return redirect(route('com.instalacions.index'));
        }

        return view('com.instalacions.show')->with('instalacion', $instalacion);
    }

    /**
     * Muestra el formulario para editar el Instalacion especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $instalacion = $this->instalacionRepository->findWithoutFail($id);

        if (empty($instalacion)) {
            Flash::error('Datos de la Instalación No Encontrados.');
            return redirect(route('com.instalacions.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $fondos = Fondo::where('activo',1)
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.instalacions.edit')->with('instalacion', $instalacion)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('fondos',$fondos);
    }

    /**
     * Actualizar el Instalacion especificado.
     *
     * @param  int              $id
     * @param UpdateInstalacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstalacionRequest $request)
    {
        $instalacion = $this->instalacionRepository->findWithoutFail($id);

        if (empty($instalacion)) {
            Flash::error('Datos de la Instalación No Encontrados.');
            return redirect(route('com.instalacions.index'));
        }

        $instalacion = $this->instalacionRepository->update($request->all(), $id);
        Flash::success('Datos de la Instalación actualizados con éxito.');
        return redirect(route('com.instalacions.index'));
    }

    /**
     * Remove the specified Instalacion from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $instalacion = $this->instalacionRepository->findWithoutFail($id);

        if (empty($instalacion)) {
            Flash::error('Datos de la Instalación No Encontrados.');
            return redirect(route('com.instalacions.index'));
        }

        $this->instalacionRepository->delete($id);
        Flash::success('Datos de la Instalación eliminados con éxito.');
        return redirect(route('com.instalacions.index'));
    }
}
