<?php

namespace InnovaCondomi\Http\Controllers\Seg;

use InnovaCondomi\DataTables\Seg\PermisoDataTable;
use InnovaCondomi\Entities\Seg\Permiso;
use InnovaCondomi\Http\Requests\Seg;
use InnovaCondomi\Http\Requests\Seg\CreatePermisoRequest;
use InnovaCondomi\Http\Requests\Seg\UpdatePermisoRequest;
use InnovaCondomi\Repositories\Seg\PermisoRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class PermisoController extends AppBaseController
{
    /** @var  PermisoRepository */
    private $permisoRepository;

    public function __construct(PermisoRepository $permisoRepo)
    {
        //$this->middleware('auth');
        $this->permisoRepository = $permisoRepo;
    }

    /**
     * Display a listing of the Permiso.
     *
     * @param PermisoDataTable $permisoDataTable
     * @return Response
     */
    public function index(PermisoDataTable $permisoDataTable)
    {
        return $permisoDataTable->render('seg.permisos.index');
    }

    /**
     * Show the form for creating a new Permiso.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('seg.permisos.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created Permiso in storage.
     *
     * @param CreatePermisoRequest $request
     *
     * @return Response
     */
    public function store(CreatePermisoRequest $request)
    {
        $input = $request->all();

        $permiso = $this->permisoRepository->create($input);

        Flash::success('Datos del Permiso grabados con éxito.');

        return redirect(route('seg.permisos.index'));
    }

    /**
     * Display the specified Permiso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$permiso = $this->permisoRepository->findWithoutFail($id);
        $permiso = Permiso::select('seg_permiso.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->where('seg_permiso.id',$id)
            ->join('com_org', 'com_org.id', '=', 'seg_permiso.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'seg_permiso.com_cliente_id')
            ->first();

        if (empty($permiso)) {
            Flash::error('Permiso No Encontrado.');

            return redirect(route('seg.permisos.index'));
        }

        return view('seg.permisos.show')->with('permiso', $permiso);
    }

    /**
     * Show the form for editing the specified Permiso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permiso = $this->permisoRepository->findWithoutFail($id);

        if (empty($permiso)) {
            Flash::error('Permiso No Encontrado.');

            return redirect(route('seg.permisos.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('seg.permisos.edit')
            ->with('permiso', $permiso)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified Permiso in storage.
     *
     * @param  int              $id
     * @param UpdatePermisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermisoRequest $request)
    {
        $permiso = $this->permisoRepository->findWithoutFail($id);

        if (empty($permiso)) {
            Flash::error('Permiso No Encontrado');

            return redirect(route('seg.permisos.index'));
        }

        $permiso = $this->permisoRepository->update($request->all(), $id);

        Flash::success('Datos del Permiso actualizados con éxito.');

        return redirect(route('seg.permisos.index'));
    }

    /**
     * Remove the specified Permiso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permiso = $this->permisoRepository->findWithoutFail($id);

        if (empty($permiso)) {
            Flash::error('Permiso No Encontrado');

            return redirect(route('seg.permisos.index'));
        }

        $this->permisoRepository->delete($id);

        Flash::success('Datos del Permiso eliminados con éxito.');

        return redirect(route('seg.permisos.index'));
    }
}
