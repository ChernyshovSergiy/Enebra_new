<?php

namespace App\Traits\Relations\HasMany;

use App\User;

trait UserLanguages
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'language_id');
    }
}