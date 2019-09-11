<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Const_section;

trait ConstSections
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function const_sections(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Const_section::class, 'menu_id', 'id');
    }
}