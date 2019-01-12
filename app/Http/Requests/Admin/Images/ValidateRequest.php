<?php

namespace App\Http\Requests\Admin\Images;

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
            'title' => 'required',
            'category_id' => 'required',
            'user_id' => 'nullable',
            'image' => 'required|image'
        ];
    }
}
