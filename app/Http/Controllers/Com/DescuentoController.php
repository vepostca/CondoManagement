<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\DescuentoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateDescuentoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateDescuentoRequest;
use InnovaCondomi\Repositories\Com\DescuentoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class DescuentoController extends AppBaseController
{
    /** @var  DescuentoRepository */
    private $descuentoRepository;

    public function __construct(DescuentoRepository $descuentoRepo)
    {
        $this->descuentoRepository = $descuentoRepo;
    }

    /**
     * Mostrar el listado para el modelo Descuento.
     *
     * @param DescuentoDataTable $descuentoDataTable
     * @return Response
     */
    public function index(DescuentoDataTable $descuentoDataTable)
    {
        return $descuentoDataTable->render('com.descuentos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Descuento.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.descuentos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo Descuento recien creado
     *
     * @param CreateDescuentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDescuentoRequest $request)
    {
        $input = $request->all();
        $descuento = $this->descuentoRepository->create($input);
        Flash::success('Datos del Descuento grabados con éxito.');
        return redirect(route('com.descuentos.index'));
    }

    /**
     * Muestra el Descuento especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $descuento = $this->descuentoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($descuento)) {
            Flash::error('Datos del Descuento No Encontrados.');
            return redirect(route('com.descuentos.index'));
        }

        return view('com.descuentos.show')->with('descuento', $descuento);
    }

    /**
     * Muestra el formulario para editar el Descuento especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $descuento = $this->descuentoRepository->findWithoutFail($id);

        if (empty($descuento)) {
            Flash::error('Datos del Descuento No Encontrados.');
            return redirect(route('com.descuentos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.descuentos.edit')->with('descuento', $descuento)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el Descuento especificado.
     *
     * @param  int              $id
     * @param UpdateDescuentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDescuentoRequest $request)
    {
        $descuento = $this->descuentoRepository->findWithoutFail($id);

        if (empty($descuento)) {
            Flash::error('Datos del Descuento No Encontrados.');
            return redirect(route('com.descuentos.index'));
        }

        $descuento = $this->descuentoRepository->update($request->all(), $id);
        Flash::success('Datos del Descuento actualizados con éxito.');
        return redirect(route('com.descuentos.index'));
    }

    /**
     * Remove the specified Descuento from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $descuento = $this->descuentoRepository->findWithoutFail($id);

        if (empty($descuento)) {
            Flash::error('Datos del Descuento No Encontrados.');
            return redirect(route('com.descuentos.index'));
        }

        $this->descuentoRepository->delete($id);
        Flash::success('Datos del Descuento eliminados con éxito.');
        return redirect(route('com.descuentos.index'));
    }
}
