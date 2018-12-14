<?php

namespace App\Http\Requests\Admin\InfVideoGroup;

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
            'menu_id' => 'required',
            'description:en' => 'required',
            'keywords:en' => 'nullable',
            'meta_desc:en' => 'nullable'
        ];
    }
}
