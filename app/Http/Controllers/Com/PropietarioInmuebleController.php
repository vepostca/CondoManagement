<?php

namespace InnovaCondomi\Http\Controllers\Com;

use InnovaCondomi\DataTables\Com\PropietarioInmuebleDataTable;
use InnovaCondomi\Entities\Com\Inmueble;
use InnovaCondomi\Entities\Com\Propietario;
use InnovaCondomi\Http\Requests\Com;
use InnovaCondomi\Http\Requests\Com\CreatePropietarioInmuebleRequest;
use InnovaCondomi\Http\Requests\Com\UpdatePropietarioInmuebleRequest;
use InnovaCondomi\Repositories\Com\PropietarioInmuebleRepository;
use Flash;
use DB;
use InnovaCondomi\Http\Controllers\AppBaseController;
use Response;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use InnovaCondomi\Entities\Com\TipoPropietario;

class PropietarioInmuebleController extends AppBaseController
{
    /** @var  PropietarioInmuebleRepository */
    private $propietarioInmuebleRepository;

    public function __construct(PropietarioInmuebleRepository $propietarioInmuebleRepo)
    {
        $this->propietarioInmuebleRepository = $propietarioInmuebleRepo;
    }

    /**
     * Mostrar el listado para el modelo PropietarioInmueble.
     *
     * @param PropietarioInmuebleDataTable $propietarioInmuebleDataTable
     * @return Response
     */
    public function index(PropietarioInmuebleDataTable $propietarioInmuebleDataTable)
    {
        return $propietarioInmuebleDataTable->render('com.propietarioInmuebles.index');
    }

    /**
     * Mostrar el formulario para crear el nuevo modelo: PropietarioInmueble.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $inmuebles = Inmueble::orderBy('codigo','ASC')->lists('nombre','id');
        //$propietarios = Propietario::orderBy('nombres','ASC')->lists('nombres','id');
        $propietarios = Propietario::select('com_propietario.*',
                        DB::raw("CONCAT(com_propietario.apellidos,' ',com_propietario.nombres) as nombre_completo"))
                        ->orderBy('nombre_completo')
                        ->lists('nombre_completo','id');
        $tiposPropietario= TipoPropietario::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.propietarioInmuebles.create')
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('inmuebles',$inmuebles)
                    ->with('propietarios',$propietarios)
                    ->with('tiposPropietario',$tiposPropietario);
    }

    /**
     * Almacenar el modelo PropietarioInmueble recien creado
     *
     * @param CreatePropietarioInmuebleRequest $request
     *
     * @return Response
     */
    public function store(CreatePropietarioInmuebleRequest $request)
    {
        $input = $request->all();
        $propietarioInmueble = $this->propietarioInmuebleRepository->create($input);
        Flash::success('Datos de la Asignación de Inmuebles y Propietarios grabados con éxito.');
        return redirect(route('com.propietarioInmuebles.index'));
    }

    /**
     * Muestra el PropietarioInmueble especificado
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $propietarioInmueble = $this->propietarioInmuebleRepository
            ->with('cliente','org','inmuebles','tipoPropietario')->findWithoutFail($id);

        if (empty($propietarioInmueble)) {
            Flash::error('Datos de la Asignación de Inmuebles y Propietarios No Encontrados');
            return redirect(route('com.propietarioInmuebles.index'));
        }

        return view('com.propietarioInmuebles.show')->with('propietarioInmueble', $propietarioInmueble);
    }

    /**
     * Muestra el formulario para editar el PropietarioInmueble especificado.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $propietarioInmueble = $this->propietarioInmuebleRepository->findWithoutFail($id);

        if (empty($propietarioInmueble)) {
            Flash::error('Datos de la Asignación de Inmuebles y Propietarios No Encontrados.');
            return redirect(route('com.propietarioInmuebles.index'));
        }
        $clientes = Cliente::logueado()->lists('nombre','id');
        $orgs = Org::orgsaccesoescritura()->orderBy('nombre','ASC')->lists('nombre','id');
        $inmuebles = Inmueble::orderBy('codigo','ASC')->lists('nombre','id');
        $propietarios = Propietario::orderBy('nombres','ASC')->lists('nombres','id');
        $tiposPropietario= TipoPropietario::orderBy('nombre','ASC')->lists('nombre','id');
        return view('com.propietarioInmuebles.edit')->with('propietarioInmueble', $propietarioInmueble)
                    ->with('clientes',$clientes)
                    ->with('orgs',$orgs)
                    ->with('inmuebles',$inmuebles)
                    ->with('propietarios',$propietarios)
                    ->with('tiposPropietario',$tiposPropietario);
    }

    /**
     * Actualizar el PropietarioInmueble especificado.
     *
     * @param  int              $id
     * @param UpdatePropietarioInmuebleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropietarioInmuebleRequest $request)
    {
        $propietarioInmueble = $this->propietarioInmuebleRepository->findWithoutFail($id);

        if (empty($propietarioInmueble)) {
            Flash::error('Datos de la Asignación de Inmuebles y Propietarios No Encontrados');
            return redirect(route('com.propietarioInmuebles.index'));
        }

        $propietarioInmueble = $this->propietarioInmuebleRepository->update($request->all(), $id);
        Flash::success('Datos de la Asignación de Inmuebles y Propietarios actualizados con éxito..');
        return redirect(route('com.propietarioInmuebles.index'));
    }

    /**
     * Remove the specified PropietarioInmueble from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $propietarioInmueble = $this->propietarioInmuebleRepository->findWithoutFail($id);

        if (empty($propietarioInmueble)) {
            Flash::error('Datos de la Asignación de Inmuebles y Propietarios No Encontrados');
            return redirect(route('com.propietarioInmuebles.index'));
        }

        $this->propietarioInmuebleRepository->delete($id);
        Flash::success('Datos de la Asignación de Inmuebles y Propietarios eliminados con éxito.');
        return redirect(route('com.propietarioInmuebles.index'));
    }
}
