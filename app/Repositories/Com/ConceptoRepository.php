<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Concepto;
use InfyOm\Generator\Common\BaseRepository;

class ConceptoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'com_categoria_concepto_id',
        'siglas',
        'orden',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Concepto::class;
    }
}
