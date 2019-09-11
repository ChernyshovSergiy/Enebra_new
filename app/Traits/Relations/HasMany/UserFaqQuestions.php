<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Faq_question;

trait UserFaqQuestions
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function faq_questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Faq_question::class, 'id', 'user_id');
    }
}