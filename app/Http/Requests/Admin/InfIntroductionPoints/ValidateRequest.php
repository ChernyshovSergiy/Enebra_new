<?php

namespace App\Http\Requests\Admin\InfIntroductionPoints;

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
            'point' => 'required',
            'link' => 'required',
            'sort' => 'required|numeric',
            'language_id' => 'required'
        ];
    }
}
