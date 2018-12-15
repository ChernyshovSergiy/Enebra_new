<?php

namespace App\Http\Requests\Admin\InfVideos;

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
            'info' => 'nullable',
            'video_group_id' => 'required',
            'video_group_section_id' => 'nullable',
            'image_id' => 'nullable',
            'sort' => 'required'
        ];
    }
}
