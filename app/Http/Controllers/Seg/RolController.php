<?php

namespace InnovaCondomi\Http\Controllers\Seg;

use InnovaCondomi\DataTables\Seg\RolDataTable;
use InnovaCondomi\Entities\Seg\Rol;
use InnovaCondomi\Http\Requests\Seg;
use InnovaCondomi\Http\Requests\Seg\CreateRolRequest;
use InnovaCondomi\Http\Requests\Seg\UpdateRolRequest;
use InnovaCondomi\Repositories\Seg\RolRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class RolController extends AppBaseController
{
    /** @var  RolRepository */
    private $rolRepository;

    public function __construct(RolRepository $rolRepo)
    {
        //$this->middleware('auth');
        $this->rolRepository = $rolRepo;
    }

    /**
     * Display a listing of the Rol.
     *
     * @param RolDataTable $rolDataTable
     * @return Response
     */
    public function index(RolDataTable $rolDataTable)
    {
        return $rolDataTable->render('seg.rols.index');
    }

    /**
     * Show the form for creating a new Rol.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('seg.rols.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created Rol in storage.
     *
     * @param CreateRolRequest $request
     *
     * @return Response
     */
    public function store(CreateRolRequest $request)
    {
        $input = $request->all();

        $rol = $this->rolRepository->create($input);

        Flash::success('Datos del Rol grabados con éxito.');

        return redirect(route('seg.rols.index'));
    }

    /**
     * Display the specified Rol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$rol = $this->rolRepository->findWithoutFail($id);
        $rol = Rol::select('seg_rol.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->where('seg_rol.id',$id)
            ->join('com_org', 'com_org.id', '=', 'seg_rol.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'seg_rol.com_cliente_id')
            ->first();

        if (empty($rol)) {
            Flash::error('Rol No Encontrado.');

            return redirect(route('seg.rols.index'));
        }

        return view('seg.rols.show')->with('rol', $rol);
    }

    /**
     * Show the form for editing the specified Rol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol No Encontrado');

            return redirect(route('seg.rols.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('seg.rols.edit')
            ->with('rol', $rol)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int              $id
     * @param UpdateRolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolRequest $request)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol No Encontrado.');

            return redirect(route('seg.rols.index'));
        }

        $rol = $this->rolRepository->update($request->all(), $id);

        Flash::success('Datos del Rol actualizados con éxito.');

        return redirect(route('seg.rols.index'));
    }

    /**
     * Remove the specified Rol from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rol = $this->rolRepository->findWithoutFail($id);

        if (empty($rol)) {
            Flash::error('Rol No Encontrado');

            return redirect(route('seg.rols.index'));
        }

        $this->rolRepository->delete($id);

        Flash::success('Datos del Rol eliminados con éxito.');

        return redirect(route('seg.rols.index'));
    }
}
