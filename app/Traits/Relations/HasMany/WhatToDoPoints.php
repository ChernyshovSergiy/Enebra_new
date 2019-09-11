<?php

namespace App\Traits\Relations\HasMany;

use App\Models\WhatToDoPoint;

trait WhatToDoPoints
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function what_to_do_points(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WhatToDoPoint::class, 'menu_id', 'id');
    }
}