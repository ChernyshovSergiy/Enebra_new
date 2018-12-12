<?php

namespace App\Http\Requests\Admin\InfPlanPhaseSections;

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
            'sub_title:en' => 'nullable|string'
        ];
    }
}
