<?php

namespace InnovaCondomi\Http\Requests\Com;

use InnovaCondomi\Http\Requests\Request;
use InnovaCondomi\Entities\Com\EstatusTarea;

class UpdateEstatusTareaRequest extends Request
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
        return EstatusTarea::$rules;
    }
}
