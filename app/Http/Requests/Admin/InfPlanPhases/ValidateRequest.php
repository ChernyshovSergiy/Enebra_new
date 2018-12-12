<?php

namespace App\Http\Requests\Admin\InfPlanPhases;

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
            //            'title:en' => 'required|string'
            'title:en' => 'nullable|string'
        ];
    }
}
