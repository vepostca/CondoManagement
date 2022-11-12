<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Cliente;
use InfyOm\Generator\Common\BaseRepository;

class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'nombre',
        'id_legal',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cliente::class;
    }
}
