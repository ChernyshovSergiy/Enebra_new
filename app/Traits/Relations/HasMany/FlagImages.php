<?php

namespace App\Traits\Relations\HasMany;

use App\Image;

trait FlagImages
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function flag_image(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Image::class, 'id', 'flag_image_id');
    }
}