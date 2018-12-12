<?php

namespace App\Http\Requests\Admin\InfPlanPhaseSectionPoint;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'entry' => 'nullable',
            'phase_id' => 'required',
            'section_id' => 'required',
            'sort' => 'required'
        ];
    }
}
