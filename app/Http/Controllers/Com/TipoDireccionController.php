<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoDireccionDataTable;
use InnovaCondomi\Entities\Com\TipoDireccion;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoDireccionRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoDireccionRequest;
use InnovaCondomi\Repositories\Com\TipoDireccionRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoDireccionController extends AppBaseController
{
    /** @var  TipoDireccionRepository */
    private $tipoDireccionRepository;

    public function __construct(TipoDireccionRepository $tipoDireccionRepo)
    {
        //$this->middleware('auth');
        $this->tipoDireccionRepository = $tipoDireccionRepo;
    }

    /**
     * Display a listing of the TipoDireccion.
     *
     * @param TipoDireccionDataTable $tipoDireccionDataTable
     * @return Response
     */
    public function index(TipoDireccionDataTable $tipoDireccionDataTable)
    {
        return $tipoDireccionDataTable->render('com.tipo_direccions.index');
    }

    /**
     * Show the form for creating a new TipoDireccion.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.tipo_direccions.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoDireccion in storage.
     *
     * @param CreateTipoDireccionRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDireccionRequest $request)
    {
        $input = $request->all();

        $tipoDireccion = $this->tipoDireccionRepository->create($input);

        Flash::success('Datos del Tipo de Dirección grabados con éxito.');

        return redirect(route('com.tipoDireccions.index'));
    }

    /**
     * Display the specified TipoDireccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$tipoDireccion = $this->tipoDireccionRepository->findWithoutFail($id);
        $tipoDireccion = TipoDireccion::select('com_tipo_direccion.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->where('com_tipo_direccion.id',$id)
            ->join('com_org', 'com_org.id', '=', 'com_tipo_direccion.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_tipo_direccion.com_cliente_id')
            ->first();

        if (empty($tipoDireccion)) {
            Flash::error('Tipo de Dirección No Encontrado');

            return redirect(route('com.tipoDireccions.index'));
        }

        return view('com.tipo_direccions.show')->with('tipoDireccion', $tipoDireccion);
    }

    /**
     * Show the form for editing the specified TipoDireccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDireccion = $this->tipoDireccionRepository->findWithoutFail($id);

        if (empty($tipoDireccion)) {
            Flash::error('Tipo de Dirección No Encontrado');

            return redirect(route('com.tipoDireccions.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.tipo_direccions.edit')
            ->with('tipoDireccion', $tipoDireccion)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoDireccion in storage.
     *
     * @param  int              $id
     * @param UpdateTipoDireccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDireccionRequest $request)
    {
        $tipoDireccion = $this->tipoDireccionRepository->findWithoutFail($id);

        if (empty($tipoDireccion)) {
            Flash::error('Tipo de Dirección No Encontrado');

            return redirect(route('com.tipoDireccions.index'));
        }

        $tipoDireccion = $this->tipoDireccionRepository->update($request->all(), $id);

        Flash::success('Datos del Tipo de Dirección actualizados con éxito.');

        return redirect(route('com.tipoDireccions.index'));
    }

    /**
     * Remove the specified TipoDireccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDireccion = $this->tipoDireccionRepository->findWithoutFail($id);

        if (empty($tipoDireccion)) {
            Flash::error('Tipo de Dirección No Encontrado');

            return redirect(route('com.tipoDireccions.index'));
        }

        $this->tipoDireccionRepository->delete($id);

        Flash::success('Datos del Tipo de Dirección eliminados con éxito.');

        return redirect(route('com.tipoDireccions.index'));
    }
}
