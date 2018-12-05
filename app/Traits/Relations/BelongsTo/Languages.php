<?php

namespace App\Traits\Relations\BelongsTo;

use App\Language;

trait Languages{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'original', 'id');
    }
}