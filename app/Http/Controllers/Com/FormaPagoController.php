<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\FormaPagoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateFormaPagoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateFormaPagoRequest;
use InnovaCondomi\Repositories\Com\FormaPagoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class FormaPagoController extends AppBaseController
{
    /** @var  FormaPagoRepository */
    private $formaPagoRepository;

    public function __construct(FormaPagoRepository $formaPagoRepo)
    {
        $this->formaPagoRepository = $formaPagoRepo;
    }

    /**
     * Mostrar el listado para el modelo FormaPago.
     *
     * @param FormaPagoDataTable $formaPagoDataTable
     * @return Response
     */
    public function index(FormaPagoDataTable $formaPagoDataTable)
    {
        return $formaPagoDataTable->render('com.formaPagos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: FormaPago.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.formaPagos.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo FormaPago recien creado
     * @param CreateFormaPagoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagoRequest $request)
    {
        $input = $request->all();
        $formaPago = $this->formaPagoRepository->create($input);
        Flash::success('Datos de Forma de Pago grabados con éxito.');
        return redirect(route('com.formaPagos.index'));
    }

    /**
     * Muestra el FormaPago especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $formaPago = $this->formaPagoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma de Pago No Encontrada');
            return redirect(route('com.formaPagos.index'));
        }

        return view('com.formaPagos.show')->with('formaPago', $formaPago);
    }

    /**
     * Muestra el formulario para editar la Forma de Pago especificada.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma de Pago No Encontrada');
            return redirect(route('com.formaPagos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.formaPagos.edit')->with('formaPago', $formaPago)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el FormaPago especificado.
     *
     * @param  int              $id
     * @param UpdateFormaPagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagoRequest $request)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma de Pago No Encontrada');
            return redirect(route('com.formaPagos.index'));
        }

        $formaPago = $this->formaPagoRepository->update($request->all(), $id);
        Flash::success('Datos de la Forma de Pago actualizada con éxito..');
        return redirect(route('com.formaPagos.index'));
    }

    /**
     * Remove the specified FormaPago from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma de Pago No Encontrada');
            return redirect(route('com.formaPagos.index'));
        }

        $this->formaPagoRepository->delete($id);
        Flash::success('Datos de la FormaPago eliminados con éxito.');
        return redirect(route('com.formaPagos.index'));
    }
}
