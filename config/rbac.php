<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Package Connection
    |--------------------------------------------------------------------------
    |
    | You can set a different database connection for this package. It will set
    | new connection for models Role and Permission. When this option is null,
    | it will connect to the main database, which is set up in database.php
    |
    */
    'connection' => null,
    /*
    |--------------------------------------------------------------------------
    | Slug Separator
    |--------------------------------------------------------------------------
    |
    | Here you can change the slug separator. This is very important in matter
    | of magic method __call() and also a `Slugable` trait. The default value
    | is a dot.
    |
    */
    'separador' => '.',
    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want, you can replace default models from this package by models
    | you created. Have a look at `Bican\Roles\Models\Role` model and
    | `Bican\Roles\Models\Permission` model.
    |
    */
    'modelos' => [
        'rol' => InnovaCondomi\Entities\Seg\Rol::class,
        'permiso' => InnovaCondomi\Entities\Seg\Permiso::class,
        'org' => InnovaCondomi\Entities\Com\Org::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Roles, Permissions and Allowed "Pretend"
    |--------------------------------------------------------------------------
    |
    | You can pretend or simulate package behavior no matter what is in your
    | database. It is really useful when you are testing you application.
    | Set up what will methods is(), can() and allowed() return.
    |
    */
    'simular' => [
        'activado' => false,
        'opciones' => [
            'es' => true,
            'puede' => true,
            'permitido' => true,
        ],
    ],
];