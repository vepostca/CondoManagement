<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\CuentaBancoDataTable;
use InnovaCondomi\Entities\Com\EntidadBancaria;
use InnovaCondomi\Entities\Com\TipoCuentaBanco;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateCuentaBancoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateCuentaBancoRequest;
use InnovaCondomi\Repositories\Com\CuentaBancoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class CuentaBancoController extends AppBaseController
{
    /** @var  CuentaBancoRepository */
    private $cuentaBancoRepository;

    public function __construct(CuentaBancoRepository $cuentaBancoRepo)
    {
        $this->cuentaBancoRepository = $cuentaBancoRepo;
    }

    /**
     * Mostrar el listado para el modelo CuentaBanco.
     *
     * @param CuentaBancoDataTable $cuentaBancoDataTable
     * @return Response
     */
    public function index(CuentaBancoDataTable $cuentaBancoDataTable)
    {
        return $cuentaBancoDataTable->render('com.cuentaBancos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: CuentaBanco.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $tiposCuentaBanco = TipoCuentaBanco::orderBy('nombre','ASC')->lists('nombre','id');
        $bancos = EntidadBancaria::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.cuentaBancos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('tiposCuentaBanco',$tiposCuentaBanco)
                    ->with('bancos',$bancos);
    }

    /**
     * Almacenar el modelo CuentaBanco recien creado
     *
     * @param CreateCuentaBancoRequest $request
     *
     * @return Response
     */
    public function store(CreateCuentaBancoRequest $request)
    {
        $input = $request->all();
        $cuentaBanco = $this->cuentaBancoRepository->create($input);
        Flash::success('Datos de la Cuenta grabados con éxito.');
        return redirect(route('com.cuentaBancos.index'));
    }

    /**
     * Muestra el CuentaBanco especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $cuentaBanco = $this->cuentaBancoRepository
            ->with('cliente','org','tipoCuentaBanco','entidadBancaria')->findWithoutFail($id);

        if (empty($cuentaBanco)) {
            Flash::error('Datos de la Cuenta No Encontrado');
            return redirect(route('com.cuentaBancos.index'));
        }
        return view('com.cuentaBancos.show')->with('cuentaBanco', $cuentaBanco);
    }

    /**
     * Muestra el formulario para editar el CuentaBanco especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $cuentaBanco = $this->cuentaBancoRepository->findWithoutFail($id);

        if (empty($cuentaBanco)) {
            Flash::error('Datos de la Cuenta No Encontrados.');
            return redirect(route('com.cuentaBancos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $tiposCuentaBanco = TipoCuentaBanco::orderBy('nombre','ASC')->lists('nombre','id');
        $bancos = EntidadBancaria::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.cuentaBancos.edit')->with('cuentaBanco', $cuentaBanco)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('tiposCuentaBanco',$tiposCuentaBanco)
                    ->with('bancos',$bancos);
    }

    /**
     * Actualizar el CuentaBanco especificado.
     *
     * @param  int              $id
     * @param UpdateCuentaBancoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuentaBancoRequest $request)
    {
        $cuentaBanco = $this->cuentaBancoRepository->findWithoutFail($id);

        if (empty($cuentaBanco)) {
            Flash::error('Datos de la Cuenta No Encontrados');
            return redirect(route('com.cuentaBancos.index'));
        }

        $cuentaBanco = $this->cuentaBancoRepository->update($request->all(), $id);
        Flash::success('Datos de la Cuenta actualizados con éxito..');
        return redirect(route('com.cuentaBancos.index'));
    }

    /**
     * Remove the specified CuentaBanco from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $cuentaBanco = $this->cuentaBancoRepository->findWithoutFail($id);

        if (empty($cuentaBanco)) {
            Flash::error('Datos de la Cuenta No Encontrados');
            return redirect(route('com.cuentaBancos.index'));
        }

        $this->cuentaBancoRepository->delete($id);
        Flash::success('Datos de la Cuenta eliminados con éxito.');
        return redirect(route('com.cuentaBancos.index'));
    }
}
