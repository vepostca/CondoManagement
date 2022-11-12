<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\ClienteInfo;
use InfyOm\Generator\Common\BaseRepository;

class ClienteInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_org_id',
        'com_moneda_id',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClienteInfo::class;
    }
}
