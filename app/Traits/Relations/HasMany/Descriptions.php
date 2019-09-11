<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Description;

trait Descriptions
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function description(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Description::class, 'desc_block_id', 'id');
    }
}