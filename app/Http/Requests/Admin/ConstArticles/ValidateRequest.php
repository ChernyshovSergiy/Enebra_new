<?php

namespace App\Http\Requests\Admin\ConstArticles;

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
            'const_sections_id' => 'required|numeric',
            'article:en' => 'required|string',
            'side' => 'required|numeric',
            'sort' => 'required|numeric'
        ];
    }
}
