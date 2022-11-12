<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\PropietarioInmueble;
use InfyOm\Generator\Common\BaseRepository;

class PropietarioInmuebleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'com_propietario_id',
        'com_inmueble_id',
        'com_tipo_propietario_id',
        'activo',
        'vive_aqui',
        'contacto_principal',
        'no_aplica_cuota'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PropietarioInmueble::class;
    }
}
