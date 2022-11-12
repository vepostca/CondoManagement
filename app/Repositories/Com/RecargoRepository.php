<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Recargo;
use InfyOm\Generator\Common\BaseRepository;

class RecargoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'dias_retraso',
        'valor',
        'tipo',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Recargo::class;
    }
}
