<?php

namespace App\Traits\Relations\HasOne;

use App\Image;

trait Images{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function images()
    {
        return $this->hasOne(Image::class,'id', 'image_id');
    }
}