<?php

namespace App\Traits\Relations\HasMany;

use App\Description;

trait Descriptions
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function description(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Description::class, 'menu_id', 'id');
    }
}