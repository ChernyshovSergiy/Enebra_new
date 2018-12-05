<?php

namespace App\Http\Requests\Admin\Images;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'category_id' => 'required',
            'user_id' => 'nullable',
            'image' => 'required|image'
        ];
    }
}
