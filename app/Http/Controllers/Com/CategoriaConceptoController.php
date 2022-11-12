<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\CategoriaConceptoDataTable;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateCategoriaConceptoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateCategoriaConceptoRequest;
use InnovaCondomi\Repositories\Com\CategoriaConceptoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class CategoriaConceptoController extends AppBaseController
{
    /** @var  CategoriaConceptoRepository */
    private $categoriaConceptoRepository;

    public function __construct(CategoriaConceptoRepository $categoriaConceptoRepo)
    {
        $this->categoriaConceptoRepository = $categoriaConceptoRepo;
    }

    /**
     * Mostrar el listado para el modelo CategoriaConcepto.
     *
     * @param CategoriaConceptoDataTable $categoriaConceptoDataTable
     * @return Response
     */
    public function index(CategoriaConceptoDataTable $categoriaConceptoDataTable)
    {
        return $categoriaConceptoDataTable->render('com.categoriaConceptos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: CategoriaConcepto.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.categoriaConceptos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Almacenar el modelo CategoriaConcepto recien creado
     *
     * @param CreateCategoriaConceptoRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaConceptoRequest $request)
    {
        $input = $request->all();
        $categoriaConcepto = $this->categoriaConceptoRepository->create($input);
        Flash::success('Datos de la Categoría Concepto grabados con éxito.');
        return redirect(route('com.categoriaConceptos.index'));
    }

    /**
     * Muestra el CategoriaConcepto especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $categoriaConcepto = $this->categoriaConceptoRepository
            ->with('cliente','org')->findWithoutFail($id);

        if (empty($categoriaConcepto)) {
            Flash::error('Datos de la Categoría Concepto No Encontrados.');
            return redirect(route('com.categoriaConceptos.index'));
        }

        return view('com.categoriaConceptos.show')->with('categoriaConcepto', $categoriaConcepto);
    }

    /**
     * Muestra el formulario para editar el CategoriaConcepto especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $categoriaConcepto = $this->categoriaConceptoRepository->findWithoutFail($id);

        if (empty($categoriaConcepto)) {
            Flash::error('Datos de la Categoría Concepto No Encontrados.');
            return redirect(route('com.categoriaConceptos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.categoriaConceptos.edit')->with('categoriaConcepto', $categoriaConcepto)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs);
    }

    /**
     * Actualizar el CategoriaConcepto especificado.
     *
     * @param  int              $id
     * @param UpdateCategoriaConceptoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaConceptoRequest $request)
    {
        $categoriaConcepto = $this->categoriaConceptoRepository->findWithoutFail($id);

        if (empty($categoriaConcepto)) {
            Flash::error('Datos de la Categoría Concepto No Encontrados.');
            return redirect(route('com.categoriaConceptos.index'));
        }

        $categoriaConcepto = $this->categoriaConceptoRepository->update($request->all(), $id);
        Flash::success('Datos de la Categoría Concepto actualizados con éxito.');
        return redirect(route('com.categoriaConceptos.index'));
    }

    /**
     * Remove the specified CategoriaConcepto from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaConcepto = $this->categoriaConceptoRepository->findWithoutFail($id);

        if (empty($categoriaConcepto)) {
            Flash::error('Categoría Concepto No Encontrado.');
            return redirect(route('com.categoriaConceptos.index'));
        }

        $this->categoriaConceptoRepository->delete($id);
        Flash::success('Datos de la Categoría Concepto eliminados con éxito.');
        return redirect(route('com.categoriaConceptos.index'));
    }
}
