<?php

namespace App\Http\Requests\Admin\InfIntroduction;

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
            'title_id'=>'required'
        ];
    }
}
