<?php

namespace InnovaCondomi\Http\Requests\Pro;

use InnovaCondomi\Http\Requests\Request;
use InnovaCondomi\Entities\Pro\Proveedor;

class UpdateProveedorRequest extends Request
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
        return Proveedor::$rules;
    }
}
