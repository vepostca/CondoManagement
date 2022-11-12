<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\DivisionDataTable;
use InnovaCondomi\Entities\Com\Division;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateDivisionRequest;
use InnovaCondomi\Http\Requests\Com\UpdateDivisionRequest;
use InnovaCondomi\Repositories\Com\DivisionRepository;
use Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class DivisionController extends AppBaseController
{
    /** @var  DivisionRepository */
    private $divisionRepository;

    public function __construct(DivisionRepository $divisionRepo)
    {
        //$this->middleware('auth');
        $this->divisionRepository = $divisionRepo;
    }

    /**
     * Display a listing of the Division.
     *
     * @param DivisionDataTable $divisionDataTable
     * @return Response
     */
    public function index(DivisionDataTable $divisionDataTable)
    {
        return $divisionDataTable->render('com.divisions.index');
    }

    /**
     * Show the form for creating a new Division.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.divisions.create')->with('clientes',$clientes)->with('orgs',$orgs);
    }

    /**
     * Store a newly created Division in storage.
     *
     * @param CreateDivisionRequest $request
     *
     * @return Response
     */
    public function store(CreateDivisionRequest $request)
    {
        $input = $request->all();

        $division = $this->divisionRepository->create($input);

        Flash::success('Datos de la División grabados con éxito.');

        return redirect(route('com.divisions.index'));
    }

    /**
     * Display the specified Division.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $division = $this->divisionRepository
            ->with('cliente','org','categoriaConcepto')->findWithoutFail($id);

        if (empty($division)) {
            Flash::error('División no encontrada');

            return redirect(route('com.divisions.index'));
        }

        return view('com.divisions.show')->with('division', $division);
    }

    /**
     * Show the form for editing the specified Division.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $division = $this->divisionRepository->findWithoutFail($id);

        if (empty($division)) {
            Flash::error('División no encontrada');

            return redirect(route('com.divisions.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.divisions.edit')->with('division', $division)->with('clientes',$clientes)->with('orgs',$orgs);
    }

    /**
     * Update the specified Division in storage.
     *
     * @param  int              $id
     * @param UpdateDivisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDivisionRequest $request)
    {
        $division = $this->divisionRepository->findWithoutFail($id);

        if (empty($division)) {
            Flash::error('División no encontrada');

            return redirect(route('com.divisions.index'));
        }

        $division = $this->divisionRepository->update($request->all(), $id);

        Flash::success('Datos de la División actualizados con éxito.');

        return redirect(route('com.divisions.index'));
    }

    /**
     * Remove the specified Division from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $division = $this->divisionRepository->findWithoutFail($id);

        if (empty($division)) {
            Flash::error('División no encontrada');

            return redirect(route('com.divisions.index'));
        }

        $this->divisionRepository->delete($id);

        Flash::success('Datos de la División eliminados con éxito.');

        return redirect(route('com.divisions.index'));
    }
}
