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
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'keywords' => 'nullable',
            'meta_desc' => 'nullable',
            'language_id' => 'required'
        ];
    }
}
