<?php

namespace InnovaCondomi\Entities\Tes;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Test
 * @package InnovaCondomi\Entities\Tes
 */
class Test extends Model
{
    use SoftDeletes;

    public $table = 'tes_test';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'email',
        'post_date',
        'words',
        'attachment',
        'password',
        'post_type',
        'post_day',
        'post_author_gender',
        'body',
        'private_post',
        'is_active',
        'is_published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'email' => 'string',
        'post_date' => 'datetime',
        'words' => 'integer',
        'attachment' => 'string',
        'password' => 'string',
        'post_type' => 'string',
        'post_day' => 'string',
        'post_author_gender' => 'string',
        'body' => 'string',
        'private_post' => 'string',
        'is_active' => 'boolean',
        'is_published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];
}
