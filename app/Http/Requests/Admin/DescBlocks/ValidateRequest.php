<?php

namespace App\Http\Requests\Admin\DescBlocks;

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
            'title' => 'required|string',
            'menu_id' => 'required|numeric',
            'sort' => 'required|numeric'
        ];
    }
}
