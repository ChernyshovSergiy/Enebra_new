<?php

namespace App\Http\Requests\Admin\InfIntroduction;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_id'=>'required'
        ];
    }
}
