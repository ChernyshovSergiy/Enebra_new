<?php

namespace App\Traits\Relations\BelongsTo;

use App\Image;

trait Images{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(Image::class,'image_id', 'id');
    }
}