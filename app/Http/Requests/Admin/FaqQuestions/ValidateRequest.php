<?php

namespace App\Http\Requests\Admin\FaqQuestions;

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
            'question:en' => 'required|string',
            'menu_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'sort' => 'nullable|numeric'
        ];
    }
}
