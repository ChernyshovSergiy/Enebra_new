<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Image;

trait Images
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function avatar(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class, 'id', 'avatar_id');
    }

}