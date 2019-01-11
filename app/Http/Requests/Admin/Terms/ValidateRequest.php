<?php

namespace App\Http\Requests\Admin\Terms;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize() :bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title:en' => 'required|string',
            'left_textarea:en' => 'required|string',
            'right_textarea:en' => 'required|string',
            'down_textarea:en' => 'required|string',
            'views_count' => 'nullable|integer'
        ];
    }
}
