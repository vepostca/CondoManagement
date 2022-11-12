<?php

namespace InnovaCondomi\Http\Requests\Seg;

use InnovaCondomi\Http\Requests\Request;
use InnovaCondomi\Entities\Seg\Permiso;

class CreatePermisoRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Permiso::$rules;
    }
}
