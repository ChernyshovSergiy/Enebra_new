<?php

namespace App\Http\Requests\Admin\FaqAnswers;

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
            'answer:en' => 'required|string',
            'faq_question_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'language_id' => 'required|numeric',
            'views' => 'nullable',
            'sort' => 'nullable|numeric'
        ];
    }
}
