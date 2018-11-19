<?php

namespace App\Http\Requests\Admin\Menus;

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
            'title' => 'required',
            'is_active' => 'nullable',
            'url' => 'required',
            'parent' => 'required',
            'sort' => 'required'
        ];
    }
}
