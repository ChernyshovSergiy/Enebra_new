<?php

namespace App\Traits\Relations\HasMany;

use App\WhatToDoPoint;

trait WhatToDoPoints
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function what_to_do_points($side): \Illuminate\Database\Eloquent\Relations\HasMany
    public function what_to_do_points(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
//        return $this->hasMany(WhatToDoPoint::class, 'menu_id', 'id')
//            ->where('side', '=', $side);
        return $this->hasMany(WhatToDoPoint::class, 'menu_id', 'id');
    }
}