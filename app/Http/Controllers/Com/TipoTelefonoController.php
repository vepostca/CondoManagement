<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoTelefonoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoTelefonoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoTelefonoRequest;
use InnovaCondomi\Repositories\Com\TipoTelefonoRepository;
use InnovaCondomi\Scopes\ClienteListScope;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\TipoTelefono;

class TipoTelefonoController extends AppBaseController
{
    /** @var  TipoTelefonoRepository */
    private $tipoTelefonoRepository;

    public function __construct(TipoTelefonoRepository $tipoTelefonoRepo)
    {
        //$this->middleware('auth');
        $this->tipoTelefonoRepository = $tipoTelefonoRepo;
    }

    /**
     * Mostrar el listado para el modelo TipoTelefono.
     *
     * @param TipoTelefonoDataTable $tipoTelefonoDataTable
     * @return Response
     */
    public function index(TipoTelefonoDataTable $tipoTelefonoDataTable)
    {
        return $tipoTelefonoDataTable->render('com.tipo_telefonos.index');
    }

    /**
     * Show the form for creating a new TipoTelefono.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_telefonos.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoTelefono in storage.
     *
     * @param CreateTipoTelefonoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoTelefonoRequest $request)
    {
        $input = $request->all();
        $tipoTelefono = $this->tipoTelefonoRepository->create($input);
        Flash::success('Datos del Tipo Contacto Telefónico grabados con éxito.');
        return redirect(route('com.tipoTelefonos.index'));
    }

    /**
     * Display the specified TipoTelefono.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoTelefono = $this->tipoTelefonoRepository
            ->with('cliente','org')->findWithoutFail($id);


        if (empty($tipoTelefono)) {
            Flash::error('Tipo Contacto Telefónico No Encontrado');
            return redirect(route('com.tipoTelefonos.index'));
        }
        return view('com.tipo_telefonos.show')->with('tipoTelefono', $tipoTelefono);
    }

    /**
     * Muestra el formulario para editar el TipoTelefono especificado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoTelefono = $this->tipoTelefonoRepository->findWithoutFail($id);

        if (empty($tipoTelefono)) {
            Flash::error('Tipo Contacto Telefónico No Encontrado.');

            return redirect(route('com.tipoTelefonos.index'));
        }

        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipo_telefonos.edit')
            ->with('tipoTelefono', $tipoTelefono)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoTelefono in storage.
     *
     * @param  int              $id
     * @param UpdateTipoTelefonoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoTelefonoRequest $request)
    {
        $tipoTelefono = $this->tipoTelefonoRepository->findWithoutFail($id);

        if (empty($tipoTelefono)) {
            Flash::error('Tipo Contacto Telefónico No Encontrado');

            return redirect(route('com.tipoTelefonos.index'));
        }

        $tipoTelefono = $this->tipoTelefonoRepository->update($request->all(), $id);

        Flash::success('Tipo Contacto Telefónico actualizado con éxito.');

        return redirect(route('com.tipoTelefonos.index'));
    }

    /**
     * Remove the specified TipoTelefono from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoTelefono = $this->tipoTelefonoRepository->findWithoutFail($id);

        if (empty($tipoTelefono)) {
            Flash::error('Tipo Contacto Telefónico No Encontrado');

            return redirect(route('com.tipoTelefonos.index'));
        }

        $this->tipoTelefonoRepository->delete($id);

        Flash::success('Tipo Contacto Telefónico eliminado con éxito.');

        return redirect(route('com.tipoTelefonos.index'));
    }
}
