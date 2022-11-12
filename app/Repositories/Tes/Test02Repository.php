<?php

namespace InnovaCondomi\Repositories\Tes;

use InnovaCondomi\Entities\Tes\Test02;
use InfyOm\Generator\Common\BaseRepository;

class Test02Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'email',
        'post_type',
        'post_day',
        'private_post',
        'is_active',
        'is_published'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Test02::class;
    }
}
