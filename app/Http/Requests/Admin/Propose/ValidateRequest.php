<?php

namespace App\Http\Requests\Admin\Propose;

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
            'goal:en' => 'required|string',
            'sort' => 'required|numeric'
        ];
    }
}
