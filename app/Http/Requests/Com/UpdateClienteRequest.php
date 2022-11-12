<?php

namespace InnovaCondomi\Http\Requests\Com;

use Illuminate\Support\Facades\Input;
use InnovaCondomi\Http\Requests\Request;
use InnovaCondomi\Entities\Com\Cliente;

class UpdateClienteRequest extends Request
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
        return Cliente::$rules;
    }

}
