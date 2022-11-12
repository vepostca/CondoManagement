<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\ConceptoDataTable;
use InnovaCondomi\Entities\Com\CategoriaConcepto;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateConceptoRequest;
use InnovaCondomi\Http\Requests\Com\UpdateConceptoRequest;
use InnovaCondomi\Repositories\Com\ConceptoRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class ConceptoController extends AppBaseController
{
    /** @var  ConceptoRepository */
    private $conceptoRepository;

    public function __construct(ConceptoRepository $conceptoRepo)
    {
        $this->conceptoRepository = $conceptoRepo;
    }

    /**
     * Mostrar el listado para el modelo Concepto.
     *
     * @param ConceptoDataTable $conceptoDataTable
     * @return Response
     */
    public function index(ConceptoDataTable $conceptoDataTable)
    {
        return $conceptoDataTable->render('com.conceptos.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: Concepto.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $categoriasConcepto = CategoriaConcepto::where('activo',1)->orderBy('orden','ASC')
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.conceptos.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('categoriasConcepto',$categoriasConcepto);
    }

    /**
     * Almacenar el modelo Concepto recien creado
     *
     * @param CreateConceptoRequest $request
     *
     * @return Response
     */
    public function store(CreateConceptoRequest $request)
    {
        $input = $request->all();
        $concepto = $this->conceptoRepository->create($input);
        Flash::success('Datos del Concepto grabados con éxito.');
        return redirect(route('com.conceptos.index'));
    }

    /**
     * Muestra el Concepto especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $concepto = $this->conceptoRepository
            ->with('cliente','org','categoriaConcepto')->findWithoutFail($id);

        if (empty($concepto)) {
            Flash::error('Datos del Concepto No Encontrado.');
            return redirect(route('com.conceptos.index'));
        }

        return view('com.conceptos.show')->with('concepto', $concepto);
    }

    /**
     * Muestra el formulario para editar el Concepto especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $concepto = $this->conceptoRepository->findWithoutFail($id);

        if (empty($concepto)) {
            Flash::error('Datos de Concepto No Encontrados.');
            return redirect(route('com.conceptos.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $categoriasConcepto = CategoriaConcepto::where('activo',1)->orderBy('orden','ASC')
            ->orderBy('nombre','ASC')
            ->lists('nombre','id');
        return view('com.conceptos.edit')->with('concepto', $concepto)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('categoriasConcepto',$categoriasConcepto);
    }

    /**
     * Actualizar el Concepto especificado.
     *
     * @param  int              $id
     * @param UpdateConceptoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConceptoRequest $request)
    {
        $concepto = $this->conceptoRepository->findWithoutFail($id);

        if (empty($concepto)) {
            Flash::error('Datos del Concepto No Encontrados.');
            return redirect(route('com.conceptos.index'));
        }

        $concepto = $this->conceptoRepository->update($request->all(), $id);
        Flash::success('Datos del Concepto actualizados con éxito.');
        return redirect(route('com.conceptos.index'));
    }

    /**
     * Remove the specified Concepto from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $concepto = $this->conceptoRepository->findWithoutFail($id);

        if (empty($concepto)) {
            Flash::error('Concepto No Encontrado.');
            return redirect(route('com.conceptos.index'));
        }

        $this->conceptoRepository->delete($id);
        Flash::success('Datos del Concepto eliminados con éxito.');
        return redirect(route('com.conceptos.index'));
    }
}
