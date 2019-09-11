<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Inf_page;

trait InfPages
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function page(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Inf_page::class, 'id', 'user_id');
    }

}