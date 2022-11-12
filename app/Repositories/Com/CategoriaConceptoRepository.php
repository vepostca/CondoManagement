<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\CategoriaConcepto;
use InfyOm\Generator\Common\BaseRepository;

class CategoriaConceptoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'siglas',
        'tipo',
        'orden',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CategoriaConcepto::class;
    }
}
