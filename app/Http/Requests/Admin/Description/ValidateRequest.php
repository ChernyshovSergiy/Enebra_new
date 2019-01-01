<?php

namespace App\Http\Requests\Admin\Description;

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
            'desc_block_id' => 'required|numeric',
            'content' => 'nullable',
            'sort' => 'required|numeric'
        ];
    }
}
