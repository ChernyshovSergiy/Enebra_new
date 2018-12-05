<?php

namespace App\Http\Requests\Admin\InfVideos;

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
            'title' => 'required',
            'description' => 'required',
            'about_author' => 'required',
            'link' => 'required',
            'duration_time' => 'required',
            'video_group_id' => 'required',
            'video_group_section_id' => 'nullable',
            'image_id' => 'required',
            'sort' => 'required'
        ];
    }
}
