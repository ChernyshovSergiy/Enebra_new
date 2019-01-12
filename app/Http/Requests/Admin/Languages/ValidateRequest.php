<?php

namespace App\Http\Requests\Admin\Languages;

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
            'slug' => 'max:2|min:2',
            'title' => 'required',
            'localization' => 'required',
            'flag_image_id' => 'required'
        ];
    }
}
