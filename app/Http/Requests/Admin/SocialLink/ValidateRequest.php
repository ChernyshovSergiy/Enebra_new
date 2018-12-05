<?php

namespace App\Http\Requests\Admin\SocialLink;

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
            'name' => 'required|string',
            'sort' => 'required|numeric',
            'image_id' => 'required|numeric'
        ];
    }
}
