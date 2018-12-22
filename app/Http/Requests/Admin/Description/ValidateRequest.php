<?php

namespace App\Http\Requests\Admin\Description;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'menu_id' => 'required|numeric',
            'text_block:en' => 'required|string',
            'sort' => 'required|numeric'
        ];
    }
}
