<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Purpose;

trait Purposes
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purpose(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Purpose::class, 'menu_id', 'id');
    }
}