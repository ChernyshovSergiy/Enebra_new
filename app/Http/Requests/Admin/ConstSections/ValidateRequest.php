<?php

namespace App\Http\Requests\Admin\ConstSections;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'menu_id' => 'required|numeric',
            'title:en' => 'required|string',
            'sort' => 'required|numeric'
        ];
    }
}
