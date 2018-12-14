<?php

namespace App\Http\Requests\Admin\InfVideoGroupSections;

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
            'title:en' => 'required',
            'video_group_id' => 'required'
        ];
    }
}
