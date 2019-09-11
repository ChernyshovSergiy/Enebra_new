<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Faq_answer;

trait FAQAnswers
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function faq_answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Faq_answer::class, 'faq_question_id', 'id');
    }
}