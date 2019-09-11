<?php

namespace App\Traits\Relations\BelongsTo;

use App\Models\Language;

trait Languages_id{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}