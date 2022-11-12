<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Moneda;
use InfyOm\Generator\Common\BaseRepository;

class MonedaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo_iso',
        'nombre',
        'simbolo',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Moneda::class;
    }
}
