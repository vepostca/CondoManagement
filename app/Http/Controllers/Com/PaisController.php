<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\PaisDataTable;
use InnovaCondomi\Entities\Com\Pais;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreatePaisRequest;
use InnovaCondomi\Http\Requests\Com\UpdatePaisRequest;
use InnovaCondomi\Repositories\Com\PaisRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class PaisController extends AppBaseController
{
    /** @var  PaisRepository */
    private $paisRepository;

    public function __construct(PaisRepository $paisRepo)
    {
        //$this->middleware('auth');
        $this->paisRepository = $paisRepo;
    }

    /**
     * Display a listing of the Pais.
     *
     * @param PaisDataTable $paisDataTable
     * @return Response
     */
    public function index(PaisDataTable $paisDataTable)
    {
        return $paisDataTable->render('com.pais.index');
    }

    /**
     * Show the form for creating a new Pais.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.pais.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created Pais in storage.
     *
     * @param CreatePaisRequest $request
     *
     * @return Response
     */
    public function store(CreatePaisRequest $request)
    {
        $input = $request->all();

        $pais = $this->paisRepository->create($input);

        Flash::success('Datos del País grabados con éxito.');

        return redirect(route('com.pais.index'));
    }

    /**
     * Display the specified Pais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$pais = $this->paisRepository->findWithoutFail($id);
        $pais = Pais::select('com_pais.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->where('com_pais.id',$id)
            ->join('com_org', 'com_org.id', '=', 'com_pais.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_pais.com_cliente_id')
            ->first();

        if (empty($pais)) {
            Flash::error('País no encontrado.');

            return redirect(route('com.pais.index'));
        }

        return view('com.pais.show')->with('pais', $pais);
    }

    /**
     * Show the form for editing the specified Pais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('País no encontrado');

            return redirect(route('com.pais.index'));
        }

        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.pais.edit')->with('pais', $pais)->with('clientes',$clientes)->with('orgs',$orgs);
    }

    /**
     * Update the specified Pais in storage.
     *
     * @param  int              $id
     * @param UpdatePaisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaisRequest $request)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('País no encontrado');

            return redirect(route('com.pais.index'));
        }

        $pais = $this->paisRepository->update($request->all(), $id);

        Flash::success('Datos del País actualizados con éxito.');

        return redirect(route('com.pais.index'));
    }

    /**
     * Remove the specified Pais from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pais = $this->paisRepository->findWithoutFail($id);

        if (empty($pais)) {
            Flash::error('País no encontrado');

            return redirect(route('com.pais.index'));
        }

        $this->paisRepository->delete($id);

        Flash::success('Datos del País eliminados con éxito.');

        return redirect(route('com.pais.index'));
    }
}
