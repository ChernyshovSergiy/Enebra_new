<?php

namespace App\Traits\Relations\BelongsTo;

use App\Models\Language;

trait Languages{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class, 'original', 'id');
    }
}