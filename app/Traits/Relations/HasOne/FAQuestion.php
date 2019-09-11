<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Faq_question;

trait FAQuestion{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faq_question(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Faq_question::class, 'id', 'faq_question_id');
    }
}