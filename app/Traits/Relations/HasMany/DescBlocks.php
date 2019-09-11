<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Desc_block;

trait DescBlocks
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function desc_block(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Desc_block::class, 'menu_id', 'id');
    }
}