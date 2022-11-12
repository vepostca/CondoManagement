<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\OrgInfo;
use InfyOm\Generator\Common\BaseRepository;

class OrgInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_moneda_id','com_tipo_calculo_cuota_id','separador_decimal','num_dec_coeficiente',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrgInfo::class;
    }
}
