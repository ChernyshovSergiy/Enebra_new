<?php

namespace App\Traits\Relations\HasMany;

use App\Faq_answer;

trait UserFAQAnswers
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function faq_answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Faq_answer::class, 'id', 'user_id');
    }
}