<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\EntidadBancariaDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateEntidadBancariaRequest;
use InnovaCondomi\Http\Requests\Com\UpdateEntidadBancariaRequest;
use InnovaCondomi\Repositories\Com\EntidadBancariaRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class EntidadBancariaController extends AppBaseController
{
    /** @var  EntidadBancariaRepository */
    private $entidadBancariaRepository;

    public function __construct(EntidadBancariaRepository $entidadBancariaRepo)
    {
        $this->entidadBancariaRepository = $entidadBancariaRepo;
    }

    /**
     * Mostrar el listado para el modelo EntidadBancaria.
     *
     * @param EntidadBancariaDataTable $entidadBancariaDataTable
     * @return Response
     */
    public function index(EntidadBancariaDataTable $entidadBancariaDataTable)
    {
        return $entidadBancariaDataTable->render('com.entidadBancarias.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: EntidadBancaria.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.entidadBancarias.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo EntidadBancaria recien creado
     *
     * @param CreateEntidadBancariaRequest $request
     *
     * @return Response
     */
    public function store(CreateEntidadBancariaRequest $request)
    {
        $input = $request->all();
        $entidadBancaria = $this->entidadBancariaRepository->create($input);
        Flash::success('Datos del Banco grabados con éxito.');
        return redirect(route('com.entidadBancarias.index'));
    }

    /**
     * Muestra el EntidadBancaria especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $entidadBancaria = $this->entidadBancariaRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($entidadBancaria)) {
            Flash::error('Datos del Banco No Encontrados.');
            return redirect(route('com.entidadBancarias.index'));
        }

        return view('com.entidadBancarias.show')->with('entidadBancaria', $entidadBancaria);
    }

    /**
     * Muestra el formulario para editar el EntidadBancaria especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $entidadBancaria = $this->entidadBancariaRepository->findWithoutFail($id);

        if (empty($entidadBancaria)) {
            Flash::error('Datos del Banco No Encontrados.');
            return redirect(route('com.entidadBancarias.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.entidadBancarias.edit')->with('entidadBancaria', $entidadBancaria)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el EntidadBancaria especificado.
     *
     * @param  int              $id
     * @param UpdateEntidadBancariaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntidadBancariaRequest $request)
    {
        $entidadBancaria = $this->entidadBancariaRepository->findWithoutFail($id);

        if (empty($entidadBancaria)) {
            Flash::error('Datos del Banco No Encontrados');
            return redirect(route('com.entidadBancarias.index'));
        }

        $entidadBancaria = $this->entidadBancariaRepository->update($request->all(), $id);
        Flash::success('EntidadBancaria actualizado con éxito..');
        return redirect(route('com.entidadBancarias.index'));
    }

    /**
     * Remove the specified EntidadBancaria from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $entidadBancaria = $this->entidadBancariaRepository->findWithoutFail($id);

        if (empty($entidadBancaria)) {
            Flash::error('Banco No Encontrado');
            return redirect(route('com.entidadBancarias.index'));
        }

        $this->entidadBancariaRepository->delete($id);
        Flash::success('Datos del Banco eliminados con éxito.');
        return redirect(route('com.entidadBancarias.index'));
    }
}
