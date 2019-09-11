<?php

namespace App\Traits\Relations\HasOne;

use App\Models\ImageCategory;

trait ImagesCategory{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image_category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ImageCategory::class, 'id', 'category_id');
    }
}