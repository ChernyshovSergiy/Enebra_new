<?php

namespace App\Http\Requests\Admin\IdDocument;

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
//            'name:en' => 'required'
            'name:en' => 'nullable'
        ];
    }
}
