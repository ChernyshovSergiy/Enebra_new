<?php

namespace App\Http\Requests\Admin\InfPages;

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
            'user_id' => 'required',
            'title_id' => 'required',
            'text' => 'nullable',
            'image_id' => 'nullable',
            'menu' => 'required|min:0|max:1',
            'if_desc' => 'required|min:0|max:1',
            'sort' => 'required',
            'original' => 'nullable'
        ];
    }
}
