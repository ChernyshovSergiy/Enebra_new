<?php

namespace App\Http\Requests\Admin\WhatToDoPoints;

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
            'point:en' => 'required|string',
            'side' => 'required|numeric',
            'sort' => 'required|numeric'
        ];
    }
}
