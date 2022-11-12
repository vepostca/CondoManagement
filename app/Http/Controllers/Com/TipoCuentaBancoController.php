<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoCuentaBancoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoCuentaBancoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoCuentaBancoRequest;
use InnovaCondomi\Repositories\Com\TipoCuentaBancoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoCuentaBancoController extends AppBaseController
{
    /** @var  TipoCuentaBancoRepository */
    private $tipoCuentaBancoRepository;

    public function __construct(TipoCuentaBancoRepository $tipoCuentaBancoRepo)
    {
        $this->tipoCuentaBancoRepository = $tipoCuentaBancoRepo;
    }

    /**
     * Mostrar el listado para el modelo TipoCuentaBanco.
     *
     * @param TipoCuentaBancoDataTable $tipoCuentaBancoDataTable
     * @return Response
     */
    public function index(TipoCuentaBancoDataTable $tipoCuentaBancoDataTable)
    {
        return $tipoCuentaBancoDataTable->render('com.tipoCuentaBancos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: TipoCuentaBanco.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipoCuentaBancos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo TipoCuentaBanco recien creado
     *
     * @param CreateTipoCuentaBancoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoCuentaBancoRequest $request)
    {
        $input = $request->all();
        $tipoCuentaBanco = $this->tipoCuentaBancoRepository->create($input);
        Flash::success('Datos del Tipo de Cuenta Bancaria grabados con éxito.');
        return redirect(route('com.tipoCuentaBancos.index'));
    }

    /**
     * Muestra el TipoCuentaBanco especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $tipoCuentaBanco = $this->tipoCuentaBancoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($tipoCuentaBanco)) {
            Flash::error('Tipo de Cuenta Bancaria No Encontrada');
            return redirect(route('com.tipoCuentaBancos.index'));
        }

        return view('com.tipoCuentaBancos.show')->with('tipoCuentaBanco', $tipoCuentaBanco);
    }

    /**
     * Muestra el formulario para editar el TipoCuentaBanco especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoCuentaBanco = $this->tipoCuentaBancoRepository->findWithoutFail($id);

        if (empty($tipoCuentaBanco)) {
            Flash::error('Tipo de Cuenta Bancaria No Encontrada');
            return redirect(route('com.tipoCuentaBancos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.tipoCuentaBancos.edit')->with('tipoCuentaBanco', $tipoCuentaBanco)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el TipoCuentaBanco especificado.
     *
     * @param  int              $id
     * @param UpdateTipoCuentaBancoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoCuentaBancoRequest $request)
    {
        $tipoCuentaBanco = $this->tipoCuentaBancoRepository->findWithoutFail($id);

        if (empty($tipoCuentaBanco)) {
            Flash::error('Tipo de Cuenta Bancaria No Encontrada');
            return redirect(route('com.tipoCuentaBancos.index'));
        }

        $tipoCuentaBanco = $this->tipoCuentaBancoRepository->update($request->all(), $id);
        Flash::success('Datos del Tipo de Cuenta Bancaria actualizados con éxito..');
        return redirect(route('com.tipoCuentaBancos.index'));
    }

    /**
     * Remove the specified TipoCuentaBanco from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tipoCuentaBanco = $this->tipoCuentaBancoRepository->findWithoutFail($id);

        if (empty($tipoCuentaBanco)) {
            Flash::error('TipoCuentaBanco No Encontrado');
            return redirect(route('com.tipoCuentaBancos.index'));
        }

        $this->tipoCuentaBancoRepository->delete($id);
        Flash::success('Datos del Tipo de Cuenta Bancaria eliminados con éxito.');
        return redirect(route('com.tipoCuentaBancos.index'));
    }
}
