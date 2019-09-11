<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Language;

trait Languages
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function language(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Language::class, 'id', 'language_id');
    }
}