<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\TipoContactoWebDataTable;
use InnovaCondomi\Entities\Com\TipoContactoWeb;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreateTipoContactoWebRequest;
use InnovaCondomi\Http\Requests\Com\UpdateTipoContactoWebRequest;
use InnovaCondomi\Repositories\Com\TipoContactoWebRepository;
use Laracasts\Flash\Flash;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;

class TipoContactoWebController extends AppBaseController
{
    /** @var  TipoContactoWebRepository */
    private $tipoContactoWebRepository;

    public function __construct(TipoContactoWebRepository $tipoContactoWebRepo)
    {
        //$this->middleware('auth');
        $this->tipoContactoWebRepository = $tipoContactoWebRepo;
    }

    /**
     * Display a listing of the TipoContactoWeb.
     *
     * @param TipoContactoWebDataTable $tipoContactoWebDataTable
     * @return Response
     */
    public function index(TipoContactoWebDataTable $tipoContactoWebDataTable)
    {
        return $tipoContactoWebDataTable->render('com.tipo_contacto_webs.index');
    }

    /**
     * Show the form for creating a new TipoContactoWeb.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.tipo_contacto_webs.create')
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Store a newly created TipoContactoWeb in storage.
     *
     * @param CreateTipoContactoWebRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoContactoWebRequest $request)
    {
        $input = $request->all();

        $tipoContactoWeb = $this->tipoContactoWebRepository->create($input);

        Flash::success('Datos del Tipo Contacto Web grabados con éxito.');

        return redirect(route('com.tipoContactoWebs.index'));
    }

    /**
     * Display the specified TipoContactoWeb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$tipoContactoWeb = $this->tipoContactoWebRepository->findWithoutFail($id);
        $tipoContactoWeb = TipoContactoWeb::select('com_tipo_contacto_web.*', 'com_cliente.nombre as nombre_cliente', 'com_org.nombre as nombre_org')
            ->where('com_tipo_contacto_web.id',$id)
            ->join('com_org', 'com_org.id', '=', 'com_tipo_contacto_web.com_org_id')
            ->join('com_cliente', 'com_cliente.id', '=', 'com_tipo_contacto_web.com_cliente_id')
            ->first();

        if (empty($tipoContactoWeb)) {
            Flash::error('Tipo Contacto Web No Encontrado');

            return redirect(route('com.tipoContactoWebs.index'));
        }

        return view('com.tipo_contacto_webs.show')->with('tipoContactoWeb', $tipoContactoWeb);
    }

    /**
     * Show the form for editing the specified TipoContactoWeb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoContactoWeb = $this->tipoContactoWebRepository->findWithoutFail($id);

        if (empty($tipoContactoWeb)) {
            Flash::error('Tipo Contacto Web No Encontrado');

            return redirect(route('com.tipoContactoWebs.index'));
        }
        $clientes = Cliente::orderBy('codigo','ASC')->lists('nombre','id');
        $orgs     = Org::orderBy('codigo','ASC')->lists('nombre','id');
        return view('com.tipo_contacto_webs.edit')
            ->with('tipoContactoWeb', $tipoContactoWeb)
            ->with('clientes',$clientes)
            ->with('orgs',$orgs);
    }

    /**
     * Update the specified TipoContactoWeb in storage.
     *
     * @param  int              $id
     * @param UpdateTipoContactoWebRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoContactoWebRequest $request)
    {
        $tipoContactoWeb = $this->tipoContactoWebRepository->findWithoutFail($id);

        if (empty($tipoContactoWeb)) {
            Flash::error('Tipo Contacto Web No Encontrado');

            return redirect(route('com.tipoContactoWebs.index'));
        }

        $tipoContactoWeb = $this->tipoContactoWebRepository->update($request->all(), $id);

        Flash::success('Datos del Tipo Contacto Web actualizados con éxito.');

        return redirect(route('com.tipoContactoWebs.index'));
    }

    /**
     * Remove the specified TipoContactoWeb from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoContactoWeb = $this->tipoContactoWebRepository->findWithoutFail($id);

        if (empty($tipoContactoWeb)) {
            Flash::error('Tipo Contacto Web No Encontrado');

            return redirect(route('com.tipoContactoWebs.index'));
        }

        $this->tipoContactoWebRepository->delete($id);

        Flash::success('Datos del Tipo Contacto Web eliminados con éxito.');

        return redirect(route('com.tipoContactoWebs.index'));
    }
}
